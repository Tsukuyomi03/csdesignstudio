<?php
include 'config.php';

$user = $_GET['user'];
$id = $_GET['pid'];



$sql2 = "UPDATE `tbl_addtocart` SET O_QTY=O_QTY+1 WHERE Cart_ID='$id' AND User='$user'";
if (mysqli_query($db, $sql2)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($db);

?>