<?php
include("config.php");
session_start();
$user = $_SESSION['User'];
$sql = "SELECT Count(`Cart_ID`) AS total_cart FROM `tbl_addtocart` WHERE User = '$user' LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();
echo $row['total_cart'];
$db->close();
?>