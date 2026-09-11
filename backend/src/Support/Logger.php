<?php
declare(strict_types=1);

namespace Gretex\Backend\Support;

final class Logger
{
    /**
     * @param array<string, mixed> $context
     */
    public static function info(string $event, array $context = []): void
    {
        self::write('info', $event, $context);
    }

    /**
     * @param array<string, mixed> $context
     */
    public static function warning(string $event, array $context = []): void
    {
        self::write('warning', $event, $context);
    }

    /**
     * @param array<string, mixed> $context
     */
    public static function error(string $event, array $context = []): void
    {
        self::write('error', $event, $context);
    }

    /**
     * @param array<string, mixed> $context
     */
    private static function write(string $level, string $event, array $context): void
    {
        $redactedKeys = ['captcha', 'g-recaptcha-response', 'csrf', 'token', 'password', 'secret', 'message'];
        foreach ($context as $key => $value) {
            foreach ($redactedKeys as $redactedKey) {
                if (str_contains(strtolower((string)$key), $redactedKey)) {
                    $context[$key] = '[redacted]';
                }
            }
        }

        $record = [
            'time' => gmdate('c'),
            'level' => $level,
            'event' => $event,
            'context' => $context,
        ];

        $path = dirname(__DIR__, 2) . '/logs/app-' . gmdate('Y-m-d') . '.log';
        $encoded = json_encode($record, JSON_UNESCAPED_SLASHES);
        if ($encoded === false || @file_put_contents($path, $encoded . PHP_EOL, FILE_APPEND | LOCK_EX) === false) {
            error_log($event);
        }
    }
}

