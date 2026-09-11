<?php
declare(strict_types=1);

namespace Gretex\Backend\Mail;

use Gretex\Backend\Config\Config;
use PHPMailer\PHPMailer\PHPMailer;

final class SmtpMailer
{
    public function send(string $recipient, string $subject, string $html, string $text, ?string $replyTo): void
    {
        if (!class_exists(PHPMailer::class)) {
            throw new \RuntimeException('PHPMailer is not installed. Run composer install in backend.');
        }

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = Config::string('SMTP_HOST');
        $mail->Port = Config::int('SMTP_PORT', 587);
        $mail->SMTPAuth = true;
        $mail->Username = Config::string('SMTP_USERNAME');
        $mail->Password = Config::string('SMTP_PASSWORD');
        $encryption = Config::string('SMTP_ENCRYPTION', 'tls');
        if ($encryption !== '') {
            $mail->SMTPSecure = $encryption;
        }

        $mail->setFrom(Config::string('MAIL_FROM_ADDRESS'), Config::string('MAIL_FROM_NAME', 'Website'));
        $mail->addAddress($recipient);
        if ($replyTo !== null && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $mail->addReplyTo($replyTo);
        }

        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $html;
        $mail->AltBody = $text;
        $mail->send();
    }
}

