<?php
include 'config.php';

$user = $_GET['user'];
$id = $_GET['pid'];


$sql = "SELECT * FROM tbl_addtocart WHERE Cart_ID='$id' LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();
if ($row['O_QTY'] > 1) {
    $sql2 = "UPDATE `tbl_addtocart` SET O_QTY=O_QTY-1 WHERE Cart_ID='$id' AND User='$user'";
    if (mysqli_query($db, $sql2)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
    mysqli_close($db);
} else {

}
?>