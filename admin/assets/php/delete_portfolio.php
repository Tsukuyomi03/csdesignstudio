<?php 

include "config.php";
session_start();

$id = $_GET['id'];
$sql = "DELETE FROM tbl_porfolio WHERE P_ID='$id'";
$sql2 = "DELETE FROM tbl_portfolio_images WHERE PI_Project='$id'";
$result = $db->query($sql);
$result2 = $db->query($sql2);
if($result && $result2){
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Deleted Successfuly";
    header("Location: " . $folder . "admin/admin_settings.php");
    exit();
}else{
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Something went wrong";
    header("Location: " . $folder . "admin/admin_settings.php");
    exit();
}
?>