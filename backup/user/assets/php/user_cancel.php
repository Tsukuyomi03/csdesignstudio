<?php
include("config.php");

$oid = $_GET["oid"];

$sql = "UPDATE `tbl_orders` SET `Order_Status`='Canceled' WHERE Order_ID='$oid'";
$result = $db->query($sql);
if ($result) {
    header("Location: " . $folder . "user/user_orders.php");
} else {
    header("Location: " . $folder . "user/user_orders.php");
}
?>