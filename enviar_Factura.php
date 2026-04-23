<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@example.com'; 
    $mail->Password   = 'your_password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; 

    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); 

    $invoice_filename = 'invoice_' . time() . '.pdf';
    $mail->addAttachment($invoice_filename);


    $mail->isHTML(true);
    $mail->Subject = 'Your Invoice';
    $mail->Body    = 'Please find attached your invoice.';
    $mail->AltBody = 'Please find attached your invoice (text version).';


    $mail->send();
    echo 'The invoice has been sent successfully.';
} catch (Exception $e) {
    echo "The invoice could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

unlink($invoice_filename);
?>