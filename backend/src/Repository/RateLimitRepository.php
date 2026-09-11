<?php
declare(strict_types=1);

namespace Gretex\Backend\Repository;

use PDO;

final class RateLimitRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function consume(string $scope, string $identifierHash, int $maxAttempts, int $windowSeconds): bool
    {
        $now = time();
        $resetAt = gmdate('Y-m-d H:i:s', $now + $windowSeconds);

        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare(
                'INSERT INTO rate_limits (scope, identifier_hash, attempts, reset_at, created_at, updated_at)
                 VALUES (:scope, :identifier_hash, 1, :reset_at, UTC_TIMESTAMP(), UTC_TIMESTAMP())
                 ON DUPLICATE KEY UPDATE
                    attempts = IF(reset_at <= UTC_TIMESTAMP(), 1, attempts + 1),
                    reset_at = IF(reset_at <= UTC_TIMESTAMP(), VALUES(reset_at), reset_at),
                    updated_at = UTC_TIMESTAMP()'
            );
            $stmt->execute([
                'scope' => $scope,
                'identifier_hash' => $identifierHash,
                'reset_at' => $resetAt,
            ]);

            $check = $this->pdo->prepare(
                'SELECT attempts FROM rate_limits WHERE scope = :scope AND identifier_hash = :identifier_hash FOR UPDATE'
            );
            $check->execute([
                'scope' => $scope,
                'identifier_hash' => $identifierHash,
            ]);
            $attempts = (int)($check->fetchColumn() ?: 0);
            $this->pdo->commit();

            return $attempts <= $maxAttempts;
        } catch (\Throwable $throwable) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw $throwable;
        }
    }
}

