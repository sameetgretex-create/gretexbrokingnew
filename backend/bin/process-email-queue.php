<?php
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

use Gretex\Backend\Config\Config;
use Gretex\Backend\Database\Database;
use Gretex\Backend\Mail\SmtpMailer;
use Gretex\Backend\Repository\EmailQueueRepository;
use Gretex\Backend\Support\Logger;

require_once __DIR__ . '/../bootstrap.php';

$token = bin2hex(random_bytes(16));
$limit = Config::int('QUEUE_BATCH_SIZE', 10);
$maxAttempts = Config::int('QUEUE_MAX_ATTEMPTS', 5);
$sent = 0;
$failed = 0;

try {
    $repo = new EmailQueueRepository(Database::pdo());
    $jobs = $repo->claimPending($token, $limit);
    $mailer = new SmtpMailer();

    foreach ($jobs as $job) {
        $attempts = (int)$job['attempts'] + 1;
        try {
            $repo->markAttemptStarted((int)$job['id'], $attempts);
            $mailer->send(
                (string)$job['recipient'],
                (string)$job['subject'],
                (string)$job['html_body'],
                (string)$job['text_body'],
                $job['reply_to'] !== null ? (string)$job['reply_to'] : null
            );
            $repo->markSent((int)$job['id']);
            $sent++;
            Logger::info('email_queue_sent', ['queue_id' => (int)$job['id'], 'email_type' => $job['email_type']]);
        } catch (Throwable $throwable) {
            $failed++;
            $repo->markFailed((int)$job['id'], $attempts, $maxAttempts, $throwable->getMessage());
            Logger::warning('email_queue_failed', ['queue_id' => (int)$job['id'], 'attempts' => $attempts]);
        }
    }

    echo "Processed " . count($jobs) . " jobs; sent {$sent}; failed {$failed}." . PHP_EOL;
    exit($failed > 0 ? 1 : 0);
} catch (Throwable $throwable) {
    Logger::error('email_queue_worker_error', ['error' => $throwable->getMessage()]);
    fwrite(STDERR, 'Queue worker failed.' . PHP_EOL);
    exit(2);
}
