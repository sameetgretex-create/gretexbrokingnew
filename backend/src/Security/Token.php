<?php
declare(strict_types=1);

namespace Gretex\Backend\Security;

use Gretex\Backend\Config\Config;

final class Token
{
    public static function csrf(): string
    {
        if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    public static function verifyCsrf(string $token): bool
    {
        return isset($_SESSION['csrf_token'])
            && is_string($_SESSION['csrf_token'])
            && hash_equals($_SESSION['csrf_token'], $token);
    }

    public static function formToken(int $issuedAt): string
    {
        return hash_hmac('sha256', (string)$issuedAt . '|' . session_id(), self::key());
    }

    public static function verifyFormToken(int $issuedAt, string $token): bool
    {
        $maxAge = Config::int('FORM_TOKEN_MAX_AGE_SECONDS', 7200);
        if ($issuedAt <= 0 || time() - $issuedAt > $maxAge || $issuedAt > time() + 60) {
            return false;
        }

        return hash_equals(self::formToken($issuedAt), $token);
    }

    private static function key(): string
    {
        $key = Config::string('APP_KEY');
        if ($key === '') {
            $key = Config::string('CAPTCHA_SECRETKEY', Config::string('GOOGLE_RECAPTCHA_SECRET'));
        }

        return $key !== '' ? $key : 'change-this-app-key';
    }
}

