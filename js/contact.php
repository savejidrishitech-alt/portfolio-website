<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        /* ---------- SMTP SETTINGS ---------- */
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'savejidrishiwork@gmail.com';     // 🔴 Apna Gmail
        $mail->Password   = 'mctg ckah fbvm qjqx';       // 🔴 Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        /* ---------- EMAIL SETTINGS ---------- */
        $mail->setFrom('savejidrishiwork@gmail.com', 'Website Contact');
        $mail->addAddress('savejidrishiwork@gmail.com');      // 🔴 Receive Email

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "
            <h2>New Contact Message</h2>
            <p><b>Name:</b> $name</p>
            <p><b>Email:</b> $email</p>
            <p><b>Message:</b><br>$message</p>
        ";

        $mail->send();
        echo "<script>alert('Message Sent Successfully');</script>";

    } catch (Exception $e) {
        echo "<script>alert('Message Failed. Try Again');</script>";
    }
}
?>
