<?php
include("config.php");

$oid = $_POST["oid"];
$sts = $_POST["sts"];

$sql = "UPDATE `tbl_orders` SET `Order_Remarks`='$sts' WHERE Order_ID='$oid'";
if (mysqli_query($db, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($db);
?>