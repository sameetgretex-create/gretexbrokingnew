<?php
declare(strict_types=1);

namespace Gretex\Backend\Security;

use Gretex\Backend\Config\Config;

final class Hasher
{
    public static function value(string $value, string $purpose): string
    {
        $key = Config::string('APP_KEY');
        if ($key === '') {
            $key = Config::string('CAPTCHA_SECRETKEY', Config::string('GOOGLE_RECAPTCHA_SECRET', 'change-this-key'));
        }

        return hash_hmac('sha256', $purpose . '|' . strtolower(trim($value)), $key);
    }
}

