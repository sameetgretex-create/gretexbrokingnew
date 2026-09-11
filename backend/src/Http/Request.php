<?php
declare(strict_types=1);

namespace Gretex\Backend\Http;

use Gretex\Backend\Config\Config;

final class Request
{
    /**
     * @return array<string, mixed>
     */
    public static function input(): array
    {
        $contentType = strtolower((string)($_SERVER['CONTENT_TYPE'] ?? ''));
        $maxBytes = Config::int('REQUEST_MAX_BYTES', 32768);
        $contentLength = (int)($_SERVER['CONTENT_LENGTH'] ?? 0);

        if ($contentLength > $maxBytes) {
            JsonResponse::send(['ok' => false, 'message' => 'The submitted form is too large.'], 413);
        }

        if (str_contains($contentType, 'application/json')) {
            $raw = file_get_contents('php://input');
            if ($raw === false || strlen($raw) > $maxBytes) {
                JsonResponse::send(['ok' => false, 'message' => 'The submitted form is too large.'], 413);
            }

            $decoded = json_decode($raw, true);
            if (!is_array($decoded)) {
                JsonResponse::send(['ok' => false, 'message' => 'Invalid request body.'], 400);
            }

            return $decoded;
        }

        if (
            str_contains($contentType, 'application/x-www-form-urlencoded') ||
            str_contains($contentType, 'multipart/form-data')
        ) {
            return $_POST;
        }

        JsonResponse::send(['ok' => false, 'message' => 'Unsupported request content type.'], 415);
    }

    public static function clientIp(): string
    {
        $remote = (string)($_SERVER['REMOTE_ADDR'] ?? '');
        $trusted = Config::csv('TRUSTED_PROXIES');

        if ($remote !== '' && in_array($remote, $trusted, true)) {
            $forwardedFor = (string)($_SERVER['HTTP_X_FORWARDED_FOR'] ?? '');
            $candidate = trim(explode(',', $forwardedFor)[0] ?? '');
            if (filter_var($candidate, FILTER_VALIDATE_IP)) {
                return $candidate;
            }
        }

        return filter_var($remote, FILTER_VALIDATE_IP) ? $remote : '0.0.0.0';
    }

    public static function applyCors(): void
    {
        $allowed = Config::csv('ALLOWED_FRONTEND_ORIGINS');
        $origin = (string)($_SERVER['HTTP_ORIGIN'] ?? '');

        if ($origin !== '' && in_array($origin, $allowed, true)) {
            header('Access-Control-Allow-Origin: ' . $origin);
            header('Vary: Origin');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
            header('Access-Control-Allow-Methods: POST, OPTIONS');
        }
    }
}

