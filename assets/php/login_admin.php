<?php
include "config.php";
session_start();
$uname = $_POST['uname'];
$pword = $_POST['pword'];
$sql = "SELECT * FROM `tbl_admin` WHERE Username = '$uname' AND Password = '$pword'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['Admin'] = $row['Username'];
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Login Sucessful";
    header("Location: " . $folder . "admin/admin_dashboard.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Username / Password is invalid";
    header("Location: " . $folder . "login_admin.php");
    exit();
}
?>