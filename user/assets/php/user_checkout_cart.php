<?php
include 'config.php';
session_start();


$user = $_SESSION['User'];
$id = $_POST['OID'];
$qty = $_POST['OQTY'];
$ocid = $_POST['OCID'];
$paymentMethod = $_POST['paymentMethod'];
$referenceNo = $_POST['referenceNo'];
$image = $_FILES['file']['name'];
$image_file_type = $_FILES['file']['type'];

$img_data = addslashes(file_get_contents($_FILES['file']['tmp_name']));

$sql = "SELECT * FROM tbl_products WHERE ID='$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

$total = $row['P_Price'] * $qty;

$sql3 = "INSERT INTO `tbl_orders`(`Order_Payment_Type`,`Order_Payment_Img`,`Order_Payment_ImgType`,`Order_Payment_ReferenceNo`,`Order_Remarks`,`Order_ProductID`, `Order_User`, `Order_QTY`, `Order_Total`, `Order_Status`) 
VALUES ('$paymentMethod','$img_data','$image_file_type','$referenceNo','Waiting Confirmation','$id','$user','$qty','$total','Pending')";

$sql4 = "DELETE FROM `tbl_addtocart` WHERE Cart_ID = '$ocid'";
if (mysqli_query($db, $sql3)) {
    if (mysqli_query($db, $sql4)) {
        header("Location: " . $folder . "user/user_orders.php");
        exit();
    }
} else {
    header("Location: " . $folder . "user/user_orders.php");
    exit();
}