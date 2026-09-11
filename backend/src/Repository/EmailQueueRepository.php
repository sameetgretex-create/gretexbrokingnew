<?php
declare(strict_types=1);

namespace Gretex\Backend\Repository;

use PDO;

final class EmailQueueRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function enqueue(int $submissionId, string $type, string $recipient, string $subject, string $html, string $text, ?string $replyTo): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO email_queue
                (submission_id, email_type, recipient, subject, html_body, text_body, reply_to, status, attempts, available_at, created_at)
             VALUES
                (:submission_id, :email_type, :recipient, :subject, :html_body, :text_body, :reply_to, "pending", 0, UTC_TIMESTAMP(), UTC_TIMESTAMP())'
        );
        $stmt->execute([
            'submission_id' => $submissionId,
            'email_type' => $type,
            'recipient' => $recipient,
            'subject' => $subject,
            'html_body' => $html,
            'text_body' => $text,
            'reply_to' => $replyTo,
        ]);
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function claimPending(string $token, int $limit): array
    {
        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare(
                'SELECT id FROM email_queue
                 WHERE status IN ("pending", "processing")
                   AND available_at <= UTC_TIMESTAMP()
                   AND (status = "pending" OR locked_at < DATE_SUB(UTC_TIMESTAMP(), INTERVAL 10 MINUTE))
                 ORDER BY available_at ASC, id ASC
                 LIMIT :limit
                 FOR UPDATE'
            );
            $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $ids = array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));

            if ($ids === []) {
                $this->pdo->commit();
                return [];
            }

            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $update = $this->pdo->prepare(
                "UPDATE email_queue SET status = 'processing', locked_at = UTC_TIMESTAMP(), processing_token = ? WHERE id IN ({$placeholders})"
            );
            $update->execute(array_merge([$token], $ids));
            $this->pdo->commit();

            $fetch = $this->pdo->prepare("SELECT * FROM email_queue WHERE processing_token = ? AND id IN ({$placeholders})");
            $fetch->execute(array_merge([$token], $ids));
            return $fetch->fetchAll();
        } catch (\Throwable $throwable) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw $throwable;
        }
    }

    public function markSent(int $id): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE email_queue SET status = "sent", sent_at = UTC_TIMESTAMP(), locked_at = NULL, processing_token = NULL, last_error = NULL WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
    }

    public function markAttemptStarted(int $id, int $attempts): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE email_queue SET attempts = :attempts, last_error = NULL WHERE id = :id AND status = "processing"'
        );
        $stmt->bindValue('attempts', $attempts, PDO::PARAM_INT);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function markFailed(int $id, int $attempts, int $maxAttempts, string $error): void
    {
        $status = $attempts >= $maxAttempts ? 'failed' : 'pending';
        $delay = min(3600, 60 * (2 ** max(0, $attempts - 1)));
        $stmt = $this->pdo->prepare(
            'UPDATE email_queue
             SET status = :status,
                 attempts = :attempts,
                 available_at = DATE_ADD(UTC_TIMESTAMP(), INTERVAL :delay SECOND),
                 locked_at = NULL,
                 processing_token = NULL,
                 last_error = :last_error
             WHERE id = :id'
        );
        $stmt->bindValue('status', $status);
        $stmt->bindValue('attempts', $attempts, PDO::PARAM_INT);
        $stmt->bindValue('delay', $delay, PDO::PARAM_INT);
        $stmt->bindValue('last_error', mb_substr($error, 0, 500));
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
