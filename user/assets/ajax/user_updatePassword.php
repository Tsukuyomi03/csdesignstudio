<?php
include("config.php");
session_start();

$user = $_SESSION['User'];
$opword = $_POST['opword'];
$npword = $_POST['npword'];
$cnpword = $_POST['cnpword'];

$sql = "SELECT * FROM tbl_users WHERE Username='$user'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
if ($opword != $row['Password']) {
    echo json_encode(array("statusCode" => 201));
} else {
    if ($npword == $row["Password"]) {
        echo json_encode(array("statusCode" => 203));
    } else {
        $sql2 = "UPDATE `tbl_users` SET `Password`='$npword' WHERE `Username` = '$user'";
        if (mysqli_query($db, $sql2)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 204));
        }
        mysqli_close($db);
    }
}
?>