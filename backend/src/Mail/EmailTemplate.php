<?php
declare(strict_types=1);

namespace Gretex\Backend\Mail;

final class EmailTemplate
{
    private const BRAND_NAME = 'Gretex Share Broking Limited';
    private const LOGO_URL = 'https://res.cloudinary.com/dszc1nqod/image/upload/v1759997918/Gretex_wgmxtx.png';
    private const WEBSITE_URL = 'https://gretexbroking.com';
    private const PRIVACY_URL = 'https://gretexbroking.com/privacy-policy';
    private const CONTACT_URL = 'https://gretexbroking.com/contact';
    private const ADDRESS = 'Naman Midtown, A wing Unit 401, FP No. 616, Tulsi Pipe Road, Dr. Ambedkar Nagar Senapati Bapat Marg, Behind Kamgar Kala Kendra, Prabhadevi, Mumbai, Maharashtra 400013';

    /**
     * @param array<string, string> $data
     * @param array<string, string> $meta
     * @return array{subject: string, html: string, text: string}
     */
    public static function internal(array $data, array $meta = []): array
    {
        $subject = 'New website contact enquiry';
        $rows = self::detailRow('Name', $data['name'])
            . self::detailRow('Email', $data['email'])
            . self::detailRow('Phone', $data['phone']);
        $requestId = $meta['request_id'] ?? '';
        $submittedAt = self::formatSubmittedAt($meta['submitted_at'] ?? null);
        $metaHtml = '';

        if ($requestId !== '' || $submittedAt !== '') {
            $metaHtml = '<tr>'
                . '<td style="padding:18px 24px; border-top:1px solid #e6ebf0; border-bottom:1px solid #e6ebf0; color:#5b6570; font-size:12px; line-height:1.7;">'
                . ($requestId !== '' ? '<p style="margin:0 0 8px 0;"><strong>Request ID:</strong> ' . self::e($requestId) . '</p>' : '')
                . ($submittedAt !== '' ? '<p style="margin:0;"><strong>Submitted At:</strong> ' . self::e($submittedAt) . '</p>' : '')
                . '</td>'
                . '</tr>';
        }

        $html = self::layout(
            'New Contact Form Submission',
            '<p style="margin:0 0 18px 0;">A new contact enquiry has been submitted on the Gretex Share Broking website. The details shared by the visitor are below for review and follow-up.</p>'
                . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="width:100%; border-collapse:collapse; font-size:14px;">'
                . $rows
                . '</table>'
                . '<p style="margin:20px 0 8px 0; font-size:14px; font-weight:700; color:#141E47;">Message</p>'
                . '<div style="padding:16px; background:#f7f9fc; border:1px solid #d7dfe9; font-size:14px; line-height:1.7;">' . nl2br(self::e($data['message'])) . '</div>',
            $metaHtml
        );
        $text = "New website contact enquiry\n\nName: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\n\nMessage:\n{$data['message']}\n";

        return compact('subject', 'html', 'text');
    }

    /**
     * @param array<string, string> $data
     * @return array{subject: string, html: string, text: string}
     */
    public static function confirmation(array $data): array
    {
        $subject = 'We received your message';
        $html = self::layout(
            'We Received Your Message',
            '<p style="margin:0 0 18px 0;">Dear ' . self::e($data['name']) . ',</p>'
                . '<p style="margin:0 0 18px 0;">Thank you for contacting Gretex Share Broking Limited. We have received your message and our team will get back to you.</p>'
                . '<p style="margin:0; color:#5b6570; font-size:14px;">For urgent support, you can also contact us at <a href="mailto:support@gretexbroking.com" style="color:#141E47; text-decoration:underline;">support@gretexbroking.com</a>.</p>'
        );
        $text = "Dear {$data['name']},\n\nThank you for contacting Gretex Share Broking Limited. We have received your message and our team will get back to you.\n";

        return compact('subject', 'html', 'text');
    }

    private static function layout(string $heading, string $content, string $afterContent = ''): string
    {
        return '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="width:100%; background:#f4f6f8; margin:0; padding:0; font-family:Arial, Helvetica, sans-serif;">'
            . '<tr>'
            . '<td align="center" style="padding:24px 12px;">'
            . '<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="width:600px; max-width:600px; background:#ffffff; border:1px solid #dfe5eb;">'
            . '<tr>'
            . '<td style="background:#104b88; padding:20px 24px; color:#ffffff;">'
            . '<div style="margin-bottom:12px;">'
            . '<img src="' . self::LOGO_URL . '" width="64" height="64" alt="' . self::BRAND_NAME . ' logo" style="display:block; border:0;">'
            . '</div>'
            . '<div style="font-size:22px; line-height:1.3; font-weight:700;">' . self::BRAND_NAME . '</div>'
            . '<div style="font-size:14px; line-height:1.6; margin-top:6px;">' . self::e($heading) . '</div>'
            . '</td>'
            . '</tr>'
            . '<tr>'
            . '<td style="padding:24px; color:#1d2733; font-size:15px; line-height:1.7;">'
            . $content
            . '</td>'
            . '</tr>'
            . $afterContent
            . '<tr>'
            . '<td style="padding:18px 24px; color:#5b6570; font-size:12px; line-height:1.7;">'
            . '<p style="margin:0 0 10px 0;">This email and any information submitted through the contact form are confidential and intended solely for review by authorised personnel of Gretex Share Broking Limited. If you are not the intended recipient, please do not share, copy, or distribute this information and delete it from your system immediately.</p>'
            . '<p style="margin:0 0 10px 0;">&copy; ' . date('Y') . ' Gretex Share Broking Limited. All Rights Reserved.</p>'
            . '<p style="margin:0;">' . self::ADDRESS . '</p>'
            . '</td>'
            . '</tr>'
            . '<tr>'
            . '<td style="padding:16px 24px 24px 24px; border-top:1px solid #e6ebf0; color:#141E47; font-size:12px; line-height:1.7;">'
            . '<a href="' . self::WEBSITE_URL . '" style="color:#141E47; text-decoration:underline;">Website</a>'
            . '<span style="color:#9aa4af;"> | </span>'
            . '<a href="' . self::CONTACT_URL . '" style="color:#141E47; text-decoration:underline;">Contact Support</a>'
            . '<span style="color:#9aa4af;"> | </span>'
            . '<a href="' . self::PRIVACY_URL . '" style="color:#141E47; text-decoration:underline;">Privacy Policy</a>'
            . '</td>'
            . '</tr>'
            . '</table>'
            . '</td>'
            . '</tr>'
            . '</table>';
    }

    private static function detailRow(string $label, string $value): string
    {
        return '<tr>'
            . '<td style="padding:10px 0; border-bottom:1px solid #e6ebf0; width:180px; font-weight:700; color:#141E47;">' . self::e($label) . '</td>'
            . '<td style="padding:10px 0; border-bottom:1px solid #e6ebf0;">' . self::e($value) . '</td>'
            . '</tr>';
    }

    private static function formatSubmittedAt(?string $value): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        try {
            return (new \DateTimeImmutable($value))->format('d M Y, h:i A T');
        } catch (\Throwable) {
            return $value;
        }
    }

    private static function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
