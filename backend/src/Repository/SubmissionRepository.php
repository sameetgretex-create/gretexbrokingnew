<?php
declare(strict_types=1);

namespace Gretex\Backend\Repository;

use PDO;

final class SubmissionRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    /**
     * @param array<string, string> $data
     */
    public function create(string $requestId, array $data, string $ipHash): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO form_submissions
                (request_id, form_type, name, email, phone, message, ip_hash, status, created_at, updated_at)
             VALUES
                (:request_id, "contact", :name, :email, :phone, :message, :ip_hash, "received", UTC_TIMESTAMP(), UTC_TIMESTAMP())'
        );
        $stmt->execute([
            'request_id' => $requestId,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
            'ip_hash' => $ipHash,
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    public function markSpam(int $submissionId): void
    {
        $stmt = $this->pdo->prepare('UPDATE form_submissions SET status = "spam", updated_at = UTC_TIMESTAMP() WHERE id = :id');
        $stmt->execute(['id' => $submissionId]);
    }
}

