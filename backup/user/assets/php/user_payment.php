<?php
include 'config.php';
session_start();

$orderID = $_POST['orderID'];
$paymentMethod = $_POST['paymentMethod'];
$referenceNo = $_POST['referenceNo'];
$image = $_FILES['file']['name'];
$image_file_type = $_FILES['file']['type'];

$img_data = addslashes(file_get_contents($_FILES['file']['tmp_name']));

$sql3 = "UPDATE `tbl_orders` SET `Order_Payment_Type`='$paymentMethod',`Order_Payment_Img`='$img_data',`Order_Payment_ImgType`='$image_file_type',
`Order_Payment_ReferenceNo`='$referenceNo',`Order_Remarks`='Waiting Confirmation' WHERE Order_ID='$orderID'";
if (mysqli_query($db, $sql3)) {
    header("Location: " . $folder . "user/user_orders.php");
} else {
    header("Location: " . $folder . "user/user_orders.php");
}
mysqli_close($db);

?>