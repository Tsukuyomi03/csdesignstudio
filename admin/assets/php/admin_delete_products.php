<?php
include 'config.php';
session_start();
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_products` WHERE ID='$id'";
$result = $db->query($sql);
if ($result) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Deleted Successfuly";
    header("Location: " . $folder . "admin/admin_products.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "There's and error parsing your request! Please try again later";
    header("Location: " . $folder . "admin/admin_products.php");
    exit();
}
?>