<?php
declare(strict_types=1);

namespace Gretex\Backend\Validation;

final class ContactFormValidator
{
    private const ALLOWED_FIELDS = [
        'name',
        'email',
        'phone',
        'message',
        'csrf_token',
        'form_issued_at',
        'form_token',
        'website',
        'g-recaptcha-response',
    ];

    /**
     * @param array<string, mixed> $input
     * @return array{valid: bool, data: array<string, mixed>, errors: array<string, string>, unexpected: list<string>}
     */
    public function validate(array $input): array
    {
        $unexpected = array_values(array_diff(array_keys($input), self::ALLOWED_FIELDS));
        $errors = [];

        $name = $this->clean((string)($input['name'] ?? ''));
        $email = strtolower($this->clean((string)($input['email'] ?? '')));
        $phone = $this->normalizePhone((string)($input['phone'] ?? ''));
        $message = $this->clean((string)($input['message'] ?? ''));

        if ($name === '' || mb_strlen($name) > 120) {
            $errors['name'] = 'Enter your full name.';
        }

        if ($email === '' || mb_strlen($email) > 254 || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Enter a valid email address.';
        }

        if ($phone === '' || strlen(preg_replace('/\D+/', '', $phone) ?? '') < 10 || mb_strlen($phone) > 20) {
            $errors['phone'] = 'Enter a valid phone number.';
        }

        if (mb_strlen($message) < 10) {
            $errors['message'] = 'Enter a message with at least 10 characters.';
        } elseif (mb_strlen($message) > 3000) {
            $errors['message'] = 'Keep the message under 3000 characters.';
        }

        if ($unexpected !== []) {
            $errors['_form'] = 'The form could not be submitted. Please refresh and try again.';
        }

        return [
            'valid' => $errors === [],
            'data' => [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
            ],
            'errors' => $errors,
            'unexpected' => $unexpected,
        ];
    }

    private function clean(string $value): string
    {
        $value = trim($value);
        $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value) ?? '';
        $value = preg_replace('/[ \t]+/u', ' ', $value) ?? '';
        return trim($value);
    }

    private function normalizePhone(string $value): string
    {
        $value = $this->clean($value);
        $value = preg_replace('/(?!^\+)[^\d]/', '', $value) ?? '';
        if (str_starts_with($value, '00')) {
            $value = '+' . substr($value, 2);
        }

        return $value;
    }
}

