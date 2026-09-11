<?php
declare(strict_types=1);

namespace Gretex\Backend\Repository;

use PDO;

final class DuplicateSubmissionRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function reserve(string $fingerprint, int $ttlSeconds): bool
    {
        $this->pdo->exec('DELETE FROM form_submission_tokens WHERE expires_at <= UTC_TIMESTAMP()');

        $expiresAt = gmdate('Y-m-d H:i:s', time() + $ttlSeconds);
        $stmt = $this->pdo->prepare(
            'INSERT IGNORE INTO form_submission_tokens (fingerprint_hash, expires_at, created_at)
             VALUES (:fingerprint_hash, :expires_at, UTC_TIMESTAMP())'
        );
        $stmt->bindValue('fingerprint_hash', $fingerprint);
        $stmt->bindValue('expires_at', $expiresAt);
        $stmt->execute();

        return $stmt->rowCount() === 1;
    }
}
