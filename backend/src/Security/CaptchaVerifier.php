<?php
declare(strict_types=1);

namespace Gretex\Backend\Security;

use Gretex\Backend\Config\Config;

final class CaptchaVerifier
{
    public function verify(string $token, string $ip, string $requestId): bool
    {
        $secret = Config::string('GOOGLE_RECAPTCHA_SECRET', Config::string('CAPTCHA_SECRETKEY'));
        if ($secret === '' || $token === '') {
            return false;
        }

        $payload = http_build_query([
            'secret' => $secret,
            'response' => $token,
            'remoteip' => $ip,
        ]);

        $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
        if ($ch === false) {
            return false;
        }

        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => Config::int('CAPTCHA_TIMEOUT_SECONDS', 5),
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
        ]);

        $body = curl_exec($ch);
        $status = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (!is_string($body) || $status < 200 || $status >= 300) {
            return false;
        }

        $decoded = json_decode($body, true);
        return is_array($decoded) && ($decoded['success'] ?? false) === true;
    }
}

