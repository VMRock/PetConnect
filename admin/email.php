<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "pawsomehaven000@gmail.com";
$mail->Password = "futohtaevjoswors";

$mail->setFrom("pawsomehaven000@gmail.com", "Pawsome Haven");
$mail->addAddress($email, $name);

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

    echo "<script>alert('Email sent successfully.');</script>";

} catch (Exception $e) {
    echo "<script>alert('Email could not be sent.');</script>";
}

// Redirect to all_orders.php after a short delay using JavaScript
echo "<script>setTimeout(function() { window.location.href = 'all_orders.php'; }, 2000);</script>";