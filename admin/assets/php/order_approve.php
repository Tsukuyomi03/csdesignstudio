<?php
include("config.php");

$oid = $_GET["oid"];

$sql = "UPDATE `tbl_orders` SET `Order_Status`='Tracking',`Order_Remarks`='Seller is preapring your item' WHERE Order_ID='$oid'";
$result = $db->query($sql);
if ($result) {
    header("Location: " . $folder . "admin/admin_orders.php");
} else {
    header("Location: " . $folder . "admin/admin_orders.php");
}
?>