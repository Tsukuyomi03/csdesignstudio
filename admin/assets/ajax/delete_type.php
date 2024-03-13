<?php
include 'config.php';
session_start();
$id = $_GET['id'];

$sql2 = "DELETE FROM `tbl_type` WHERE `ID` = $id";
if (mysqli_query($db, $sql2)) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Deleted Successfully";
    header("Location: " . $folder . "admin/admin_settings.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Something Went Wrong";
    header("Location: " . $folder . "admin/admin_settings.php");
    exit();
}
?>