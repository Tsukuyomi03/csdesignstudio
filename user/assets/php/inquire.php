<?php
include ("config.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
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

$fullname = $fname . " " . $lname;

//Recipients
$mail->From = $email;
$mail->FromName = $fullname;
$mail->addAddress('ginotoralba0031@gmail.com', 'Gino Toralba');

//Content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = '<h3 style="text-decoration:none">Email: ' . $email . '</h3>';
$mail->Body .= "<h3>Contact: $contact </h3>";
$mail->Body .= "<h2>$message</h2>";
if ($mail->send()) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Successfully Sent";
    header("Location: " . $folder . "user/user_contact.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Somwthing Went Wrong";
    header("Location: " . $folder . "user/user_contact.php");
    exit();
}
?>