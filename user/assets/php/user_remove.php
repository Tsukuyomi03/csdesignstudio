<?php
include("config.php");

$oid = $_GET["oid"];

$sql = "DELETE FROM `tbl_orders` WHERE Order_ID='$oid'";
$result = $db->query($sql);
if ($result) {
    header("Location: " . $folder . "user/user_orders.php");
} else {
    header("Location: " . $folder . "user/user_orders.php");
}
?>