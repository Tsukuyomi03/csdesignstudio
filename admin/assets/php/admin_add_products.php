<?php
include "config.php";
session_start();

$pname = $_POST['pname'];
$pdes = $_POST['pdes'];
$pprice = $_POST['pprice'];
$ptype = $_POST['ptype'];
$image = $_FILES['file']['name'];
$image_file_type = $_FILES['file']['type'];

$img_data = addslashes(file_get_contents($_FILES['file']['tmp_name']));

if ($_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == 'image/jpeg') {
    $sql = "INSERT INTO `tbl_products`(`P_Name`, `P_Description`, `P_Type`,`P_Price`, `P_Img_Name`, `P_Img_Type`) VALUES ('$pname','$pdes','$ptype','$pprice','$img_data','$image_file_type')";
    $result = $db->query($sql);
    if ($result) {
        $_SESSION["status"] = "success";
        $_SESSION["message"] = "Product successfuly added!";
        header("Location: " . $folder . "admin/admin_products.php");
        exit();
    } else {
        $_SESSION["status"] = "error";
        $_SESSION["message"] = "There's an error parsing your request! please try again later";
        header("Location: " . $folder . "admin/admin_products.php");
        exit();
    }
} else {
    $_SESSION["status"] = "error";
    $_SESSION["message"] = "Attach Valid Image Format";
    header("Location: " . $folder . "admin/admin_products.php");
    exit();
}

?>