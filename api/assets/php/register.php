<?php
include "config.php";

session_start();


$name = $_POST["name"];
$surname = $_POST["surname"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pword = $_POST["pword"];

$sql1 = "SELECT * FROM tbl_users Where Username = '$uname' OR Email = '$email' LIMIT 1";
$result = mysqli_query($db, $sql1);
$fetch = mysqli_fetch_assoc($result);

if ($fetch) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Username / Email Already Exist";
    header("Location: " . $folder . "register.php");
    exit();
} else {
    $sql2 = "INSERT INTO `tbl_users`(`Username`, `Password`, `Name`, `Last_Name`, `Contact`, `Email`) VALUES ('$uname','$pword','$name','$surname','$contact','$email')";
    $result2 = $db->query($sql2);
    if ($result2) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Account Registered Successfuly.";
        header("Location: " . $folder . "login_user.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "There's an error parsing your request";
        header("Location: " . $folder . "register.php");
        exit();
    }
}
?>