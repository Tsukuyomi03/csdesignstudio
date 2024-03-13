<?php
include 'config.php';
session_start();
$ptype = $_POST['ptype'];

$sql = "SELECT * FROM tbl_type WHERE `Type`='$ptype'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Product Already Existed";
    header("Location: " . $folder . "admin/admin_settings.php");
    exit();
} else {
    $sql2 = "INSERT INTO `tbl_type`(`Type`) VALUES ('$ptype')";
    if (mysqli_query($db, $sql2)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Added Successfully";
        header("Location: " . $folder . "admin/admin_settings.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: " . $folder . "admin/admin_settings.php");
        exit();
    }
}
?>