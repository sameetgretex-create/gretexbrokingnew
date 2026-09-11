<?php
declare(strict_types=1);

use Gretex\Backend\Http\JsonResponse;
use Gretex\Backend\Http\Request;
use Gretex\Backend\Security\CaptchaVerifier;
use Gretex\Backend\Security\Token;
use Gretex\Backend\Service\ContactSubmissionService;
use Gretex\Backend\Service\DuplicateSubmission;
use Gretex\Backend\Service\RateLimitExceeded;
use Gretex\Backend\Support\Logger;
use Gretex\Backend\Validation\ContactFormValidator;

require_once __DIR__ . '/../bootstrap.php';

Request::applyCors();

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'OPTIONS') {
    JsonResponse::send(['ok' => true]);
}

$requestId = bin2hex(random_bytes(16));

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    JsonResponse::send(['ok' => false, 'request_id' => $requestId, 'message' => 'Method not allowed.'], 405, ['Allow' => 'POST']);
}

try {
    $input = Request::input();
    $ip = Request::clientIp();

    $csrf = (string)($input['csrf_token'] ?? '');
    $issuedAt = (int)($input['form_issued_at'] ?? 0);
    $formToken = (string)($input['form_token'] ?? '');
    $honeypot = trim((string)($input['website'] ?? ''));

    if (!Token::verifyCsrf($csrf) || !Token::verifyFormToken($issuedAt, $formToken)) {
        Logger::warning('contact_security_token_rejected', ['request_id' => $requestId]);
        JsonResponse::send(['ok' => false, 'request_id' => $requestId, 'message' => 'Please refresh the page and try again.'], 419);
    }

    $minimumSeconds = \Gretex\Backend\Config\Config::int('FORM_MIN_SECONDS', 3);
    if ($honeypot !== '' || time() - $issuedAt < $minimumSeconds) {
        Logger::warning('contact_spam_signal_rejected', ['request_id' => $requestId]);
        JsonResponse::send(['ok' => true, 'request_id' => $requestId, 'message' => 'Thank you. Your message has been received.']);
    }

    $validation = (new ContactFormValidator())->validate($input);
    if (!$validation['valid']) {
        JsonResponse::send([
            'ok' => false,
            'request_id' => $requestId,
            'message' => 'Please correct the highlighted fields.',
            'errors' => $validation['errors'],
        ], 422);
    }

    $captchaToken = (string)($input['g-recaptcha-response'] ?? '');
    if (!(new CaptchaVerifier())->verify($captchaToken, $ip, $requestId)) {
        Logger::warning('contact_captcha_rejected', ['request_id' => $requestId]);
        JsonResponse::send(['ok' => false, 'request_id' => $requestId, 'message' => 'Please complete the CAPTCHA and try again.'], 422, []);
    }

    (new ContactSubmissionService())->submit($requestId, $validation['data'], $ip);

    JsonResponse::send([
        'ok' => true,
        'request_id' => $requestId,
        'message' => 'Thank you. Your message has been received.',
    ]);
} catch (RateLimitExceeded) {
    JsonResponse::send(['ok' => false, 'request_id' => $requestId, 'message' => 'Too many submissions. Please try again later.'], 429, ['Retry-After' => '600']);
} catch (DuplicateSubmission) {
    JsonResponse::send(['ok' => false, 'request_id' => $requestId, 'message' => 'This message was already received.'], 409);
} catch (Throwable $throwable) {
    Logger::error('contact_unhandled_error', ['request_id' => $requestId, 'error' => $throwable->getMessage()]);
    JsonResponse::send(['ok' => false, 'request_id' => $requestId, 'message' => 'We could not submit the form right now. Please try again later.'], 500);
}

