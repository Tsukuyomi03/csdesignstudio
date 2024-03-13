<?php
include("config.php");
session_start();
$user = $_SESSION['User'];
$sql = "SELECT Count(`Order_ID`) AS total_canceled FROM `tbl_orders` WHERE Order_User = '$user' AND Order_Status='Canceled' LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();
echo $row['total_canceled'];
$db->close();
?>