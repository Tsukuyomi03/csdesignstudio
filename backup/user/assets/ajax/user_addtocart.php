<?php
include 'config.php';

$user = $_GET['user'];
$id = $_POST['id'];
$qty = $_POST['qty'];

$sql = "SELECT * FROM `tbl_addtocart` WHERE `User`='$user' AND `O_ID`='$id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $sql2 = "UPDATE `tbl_addtocart` SET O_QTY=O_QTY+'$qty' WHERE O_ID='$id' AND User='$user'";
    if (mysqli_query($db, $sql2)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
    mysqli_close($db);

} else {
    $sql3 = "INSERT INTO `tbl_addtocart`(`User`, `O_ID`, `O_QTY`) VALUES ('$user','$id','$qty')";
    if (mysqli_query($db, $sql3)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
    mysqli_close($db);
}
?>