<?php
include("config.php");

$oid = $_GET["oid"];

$sql = "UPDATE `tbl_orders` SET `Order_Payment_Type`='',`Order_Payment_Img`='',`Order_Payment_ImgType`='',`Order_Payment_ReferenceNo`='',`Order_Remarks`='Invalid Payment/Incorrect Reference No.' WHERE Order_ID='$oid'";
$result = $db->query($sql);
if ($result) {
    header("Location: " . $folder . "admin/admin_orders.php");
} else {
    header("Location: " . $folder . "admin/admin_orders.php");
}
?>