<?php
include 'config.php';
session_start();
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_addtocart` WHERE Cart_ID='$id'";
$result = $db->query($sql);
if ($result) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Deleted Successfuly";
    header("Location: " . $folder . "user/user_cart.php");
    exit();
} else {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "There's and error parsing your request! Please try again later";
    header("Location: " . $folder . "user/user_cart.php");
    exit();
}
?>