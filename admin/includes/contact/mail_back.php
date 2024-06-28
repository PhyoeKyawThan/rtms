<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

function send_mail(string $to, string $subject, string $content_): bool
{
    $mail = new PHPMailer(true);
    $receiver = $to;
    $content = $content_;

    try {
        $mail->SMTPDebug = 0; // Set to 0 for no debug output in production
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rockyrityguard@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'udwrsjsvsnndwxxu'; // Replace with your Gmail password or app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('rockyrityguard@gmail.com', 'Rocky'); // Replace with your Gmail address and name
        $mail->addAddress($receiver); // Replace with the receiver's email address

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AltBody = strip_tags($content); // AltBody should be plain text

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo); // Log the error
        return false;
    }
}

if (isset($_POST['mail']) && isset($_POST['reply-content']) && isset($_POST["subject"])) {
    if (send_mail($_POST["mail"], $_POST["subject"], $_POST["reply-content"])) {
        http_response_code(200);
        header("Location: /mail_back?message=Mail has been sent successfully!");
        exit;
    } else {
        http_response_code(200);
        header("Location: /mail_back?error=Error while sending mail");
        exit;
    }
}

?>
