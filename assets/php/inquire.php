<?php
include("config.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'smtp.mail.yahoo.com';
$mail->SMTPAuth = true;
$mail->Username = 'mark_ronel_17@yahoo.com';
$mail->Password = 'smunqatocboooljx';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

//Recipients
$mail->setFrom("" . $email . "", $name);
$mail->addAddress('ginotoralba0031@gmail.com', 'Gino Toralba');

//Content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
if ($mail->send()) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Mail Sent Sucessfully";
    header("Location: " . $folder . "index.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Somwthing Went Wrong";
    header("Location: " . $folder . "index.php");
    exit();
}
?>