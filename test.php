<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'iit.aspirant10@gmail.com';
$mail->Password = 'dcuf quvl zorm mqfe';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('nthing@gmail.com', 'Test');
$mail->addAddress('iit.aspirant10@gmail.com');
$mail->Subject = 'Test';
$mail->Body = 'Test email';
try {
    $mail->send();
    echo 'Email sent';
} catch (Exception $e) {
    echo 'Error: ' . $mail->ErrorInfo;
}
?>