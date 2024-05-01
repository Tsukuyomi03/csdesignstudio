<?php
include "config.php";

session_start();

$name = strtoupper($db->real_escape_string($_POST["name"]));
$surname = strtoupper($db->real_escape_string($_POST["surname"]));
$contact = $db->real_escape_string($_POST["contact"]);
$email = $db->real_escape_string($_POST["email"]);
$uname = $db->real_escape_string($_POST["uname"]);
$pword = $db->real_escape_string($_POST["pword"]);
$street = strtoupper($db->real_escape_string($_POST["street_text"]));
$brgy = strtoupper($db->real_escape_string($_POST["brgy_text"]));
$city = strtoupper($db->real_escape_string($_POST["city_text"]));
$province = strtoupper($db->real_escape_string($_POST["province_text"]));
$region = strtoupper($db->real_escape_string($_POST["region_text"]));

$sql1 = "SELECT * FROM tbl_users Where Username = '$uname' OR Email = '$email' LIMIT 1";
$result = mysqli_query($db, $sql1);
$fetch = mysqli_fetch_assoc($result);

if ($fetch) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Username / Email Already Exist";
    header("Location: " . $folder . "index_register.php");
    exit();
} else {
    $sql2 = "INSERT INTO `tbl_users`(`Username`, `Password`, `Name`, `Last_Name`, `Contact`, `Email`,`Street`,`Brgy`,`City`,`Province`,`Region`) 
    VALUES ('$uname','$pword','$name','$surname','$contact','$email','$street','$brgy','$city','$province','$region')";

    $result2 = $db->query($sql2);
    if ($result2) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Account Registered Successfuly.";
        header("Location: " . $folder . "index_login.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "There's an error parsing your request";
        header("Location: " . $folder . "index_register.php");
        exit();
    }
}
?>