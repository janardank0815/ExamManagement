<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require 'vendor/autoload.php';

// Retrieve email address from the form
$to = $_POST['email'];

// Generate OTP
$otp = rand(100000, 999999);

// Email details
$subject = 'Your OTP for Password Reset';
$message = 'Your OTP is: ' . $otp;

// Instantiate PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Your SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username'; // Your SMTP username
    $mail->Password = 'your_smtp_password'; // Your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set sender and recipient
    $mail->setFrom('your_email@example.com', 'Your Name'); // Sender email and name
    $mail->addAddress($to); // Recipient email

    // Email content
    $mail->isHTML(false); // Set to true if you're sending HTML content
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    $mail->send();
    echo 'OTP sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>