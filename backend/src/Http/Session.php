<?php
declare(strict_types=1);

namespace Gretex\Backend\Http;

final class Session
{
    public static function start(): void
    {
        if (PHP_SAPI === 'cli') {
            return;
        }

        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        $savePath = session_save_path();
        $savePath = $savePath !== '' ? $savePath : sys_get_temp_dir();
        if (!is_dir($savePath) || !is_writable($savePath)) {
            $fallbackPath = sys_get_temp_dir();
            if (is_dir($fallbackPath) && is_writable($fallbackPath)) {
                session_save_path($fallbackPath);
            }
        }

        @session_start();
    }
}
