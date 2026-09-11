<?php
declare(strict_types=1);

namespace Gretex\Backend\Service;

use Gretex\Backend\Config\Config;
use Gretex\Backend\Database\Database;
use Gretex\Backend\Mail\EmailTemplate;
use Gretex\Backend\Repository\DuplicateSubmissionRepository;
use Gretex\Backend\Repository\EmailQueueRepository;
use Gretex\Backend\Repository\RateLimitRepository;
use Gretex\Backend\Repository\SubmissionRepository;
use Gretex\Backend\Security\Hasher;
use Gretex\Backend\Support\Logger;

final class ContactSubmissionService
{
    /**
     * @param array<string, string> $data
     */
    public function submit(string $requestId, array $data, string $ip): void
    {
        $pdo = Database::pdo();
        $ipHash = Hasher::value($ip, 'ip');
        $emailHash = Hasher::value($data['email'], 'email');

        $rateLimiter = new RateLimitRepository($pdo);
        $limits = [
            ['contact_ip_10m', $ipHash, Config::int('RATE_LIMIT_IP_10M', 5), 600],
            ['contact_ip_24h', $ipHash, Config::int('RATE_LIMIT_IP_24H', 20), 86400],
            ['contact_email_1h', $emailHash, Config::int('RATE_LIMIT_EMAIL_1H', 3), 3600],
            ['contact_global_1m', 'global', Config::int('RATE_LIMIT_GLOBAL_1M', 60), 60],
        ];

        foreach ($limits as [$scope, $identifier, $max, $window]) {
            if (!$rateLimiter->consume($scope, $identifier, $max, $window)) {
                Logger::warning('contact_rate_limited', ['request_id' => $requestId, 'scope' => $scope]);
                header('Retry-After: 600');
                throw new RateLimitExceeded();
            }
        }

        $pdo->beginTransaction();
        try {
            $fingerprint = Hasher::value($data['email'] . '|' . $data['phone'] . '|' . $data['message'], 'duplicate');
            $duplicates = new DuplicateSubmissionRepository($pdo);
            if (!$duplicates->reserve($fingerprint, Config::int('DUPLICATE_WINDOW_SECONDS', 1800))) {
                Logger::warning('contact_duplicate_rejected', ['request_id' => $requestId]);
                throw new DuplicateSubmission();
            }

            $submissions = new SubmissionRepository($pdo);
            $queue = new EmailQueueRepository($pdo);
            $submissionId = $submissions->create($requestId, $data, $ipHash);

            $internal = EmailTemplate::internal($data, [
                'request_id' => $requestId,
                'submitted_at' => gmdate(DATE_ATOM),
            ]);
            foreach (Config::csv('MAIL_INTERNAL_RECIPIENTS', ['support@gretexbroking.com']) as $recipient) {
                if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                    $queue->enqueue($submissionId, 'internal_notification', $recipient, $internal['subject'], $internal['html'], $internal['text'], $data['email']);
                }
            }

            $confirmation = EmailTemplate::confirmation($data);
            $queue->enqueue($submissionId, 'user_confirmation', $data['email'], $confirmation['subject'], $confirmation['html'], $confirmation['text'], null);

            $pdo->commit();
            Logger::info('contact_submission_accepted', ['request_id' => $requestId, 'submission_id' => $submissionId]);
        } catch (\Throwable $throwable) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            Logger::error('contact_submission_failed', ['request_id' => $requestId, 'error' => $throwable->getMessage()]);
            throw $throwable;
        }
    }
}
