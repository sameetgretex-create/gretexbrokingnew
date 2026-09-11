<?php
declare(strict_types=1);

namespace Gretex\Backend\Database;

use Gretex\Backend\Config\Config;
use PDO;

final class Database
{
    private static ?PDO $pdo = null;

    public static function pdo(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $host = Config::string('DB_HOST', 'localhost');
        $port = Config::int('DB_PORT', 3306);
        $name = Config::string('DB_NAME');
        $user = Config::string('DB_USER');
        $password = Config::string('DB_PASSWORD');

        $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";
        self::$pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return self::$pdo;
    }
}

