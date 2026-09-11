<?php
declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

use Gretex\Backend\Mail\EmailTemplate;
use Gretex\Backend\Validation\ContactFormValidator;

$failures = 0;

function check(bool $condition, string $message): void
{
    global $failures;
    if (!$condition) {
        $failures++;
        echo "FAIL: {$message}" . PHP_EOL;
        return;
    }

    echo "PASS: {$message}" . PHP_EOL;
}

$validator = new ContactFormValidator();
$valid = $validator->validate([
    'name' => 'Test User',
    'email' => 'Test.User@example.com',
    'phone' => '+91 98765 43210',
    'message' => 'This is a valid test message.',
    'csrf_token' => 'x',
    'form_issued_at' => (string)time(),
    'form_token' => 'x',
    'website' => '',
    'g-recaptcha-response' => 'x',
]);

check($valid['valid'] === true, 'valid contact payload passes');
check($valid['data']['email'] === 'test.user@example.com', 'email is normalized to lowercase');
check($valid['data']['phone'] === '+919876543210', 'phone is normalized');

$missing = $validator->validate([
    'name' => '',
    'email' => 'not-email',
    'phone' => '12',
    'message' => 'short',
]);

check($missing['valid'] === false, 'invalid contact payload fails');
check(isset($missing['errors']['name'], $missing['errors']['email'], $missing['errors']['phone'], $missing['errors']['message']), 'field errors are returned');

$unexpected = $validator->validate([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'phone' => '9876543210',
    'message' => str_repeat('A', 20),
    'admin' => '1',
]);

check($unexpected['valid'] === false && isset($unexpected['errors']['_form']), 'unexpected fields are rejected');

$template = EmailTemplate::internal([
    'name' => '<script>alert(1)</script>',
    'email' => 'person@example.com',
    'phone' => '+919876543210',
    'message' => '<b>Hello</b>',
]);

check(!str_contains($template['html'], '<script>') && str_contains($template['html'], '&lt;script&gt;'), 'HTML email escapes user-controlled values');

exit($failures > 0 ? 1 : 0);

