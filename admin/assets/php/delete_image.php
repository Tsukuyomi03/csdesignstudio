<?php
include 'config.php';
session_start();
$id = $_GET['id'];
$pid = $_GET['pid'];

$sql = "DELETE FROM `tbl_portfolio_images` WHERE PI_ID='$pid'";
$result = $db->query($sql);
if ($result) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Deleted Successfuly";
    header("Location: " . $folder . "admin/admin_pview.php?id=$id");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "There's an error parsing your request! Please try again later";
    header("Location: " . $folder . "admin/admin_pview.php?id=$id");
    exit();
}
?>
