<?php
include("config.php");

$oid = $_GET["oid"];
$datenow = date("Y/m/d");
$sql = "UPDATE `tbl_orders` SET `Order_Status`='Completed',`Order_Remarks`='Item has been delivered',Order_Completed='$datenow' WHERE Order_ID='$oid'";
if (mysqli_query($db, $sql)) {
    header("Location: " . $folder . "admin/admin_orders.php");
} else {
    header("Location: " . $folder . "admin/admin_orders.php");
}
mysqli_close($db);
?>