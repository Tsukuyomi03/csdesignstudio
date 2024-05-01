<?php
include ("config.php");
session_start();
$user = $_SESSION['User'];

$street = strtoupper($db->real_escape_string($_POST["street_text"]));
$brgy = strtoupper($db->real_escape_string($_POST["brgy_text"]));
$city = strtoupper($db->real_escape_string($_POST["city_text"]));
$province = strtoupper($db->real_escape_string($_POST["province_text"]));
$region = strtoupper($db->real_escape_string($_POST["region_text"]));

$sql3 = "UPDATE `tbl_users` SET `Street`='$street',`Brgy`='$brgy',`City`='$city',`Province`='$province', `Region`= '$region' WHERE `Username`='$user'";
$result3 = $db->query($sql3);
if ($result3) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Update Successful";
    header("Location: " . $folder . "user/user_profile.php");
    exit();
} else {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Login Sucessful";
    header("Location: " . $folder . "user/user_profile.php");
    exit();
}
?>