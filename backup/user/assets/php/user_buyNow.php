<?php
include 'config.php';
session_start();


$user = $_SESSION['User'];
$id = $_POST['id'];
$qty = $_POST['qty'];

$sql = "SELECT * FROM tbl_products WHERE ID='$id'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

$total = $row['P_Price'] * $qty;

$sql3 = "INSERT INTO `tbl_orders`(`Order_ProductID`, `Order_User`, `Order_QTY`, `Order_Total`, `Order_Status`, `Order_Remarks`) VALUES ('$id','$user','$qty','$total','Pending','Pay the item first.')";

if (mysqli_query($db, $sql3)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($db);

?>