<?php
include ("config.php");
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
$mail->isHTML(true);
$mail->isSMTP();
$mail->CharSet = "utf-8";

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mh.tokio@gmail.com';
$mail->Password = 'ykjm qmeg bibi hard';
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

//Recipients
$mail->setFrom("$email", "$name");
$mail->addAddress('mh.tokio@gmail.com', 'Gino Toralba');

//Content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
if ($mail->send()) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Mail Sent Sucessfully";
    header("Location: " . $folder . "index_about.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Somwthing Went Wrong";
    header("Location: " . $folder . "index_about.php");
    exit();
}
?>