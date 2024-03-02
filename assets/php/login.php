<?php
include "config.php";
session_start();
$uname = $_POST['uname'];
$pword = $_POST['pword'];
$sql = "SELECT * FROM `tbl_users` WHERE Username = '$uname' AND Password = '$pword'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['Email'];
    $_SESSION['User'] = $row['Username'];
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Login Sucessful";
    header("Location: " . $folder . "user_index.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Username / Password is invalid";
    header("Location: " . $folder . "login_user.php");
    exit();
}
?>