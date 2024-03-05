<?php
include "config.php";
session_start();

$pid = $_POST['pid'];
$pname = $_POST['pname'];
$pdes = $_POST['pdes'];
$pprice = $_POST['pprice'];


$sql = "SELECT * FROM `tbl_products` WHERE ID='$pid'";
$result = $db->query($sql);
$row = mysqli_fetch_array($result);
$original_price = $row["P_Price"];

if ($original_price == $pprice) {
    $_SESSION["status"] = "error";
    $_SESSION["message"] = "You can't input the oroginal Price!";
    header("Location: " . $folder . "admin/admin_products.php");
    exit();
} else {
    if ($pprice < 0) {
        $_SESSION["status"] = "error";
        $_SESSION["message"] = "Input a Valid Price!";
        header("Location: " . $folder . "admin/admin_products.php");
        exit();
    } else {
        $sql = "UPDATE `tbl_products` SET `P_Name`='$pname',`P_Description`='$pdes',`P_Price`='$pprice' WHERE ID='$pid'";
        $result = $db->query($sql);
        if ($result) {
            $_SESSION["status"] = "success";
            $_SESSION["message"] = "Product successfuly updated!";
            header("Location: " . $folder . "admin/admin_products.php");
            exit();
        } else {
            $_SESSION["status"] = "error";
            $_SESSION["message"] = "There's an error parsing your request! please try again later";
            header("Location: " . $folder . "admin/admin_products.php");
            exit();
        }
    }
}
?>