<?php
include "config.php";

session_start();


$name = strtoupper($db->real_escape_string($_POST["name"]));
$surname = strtoupper($db->real_escape_string($_POST["surname"]));
$contact = $db->real_escape_string($_POST["contact"]);
$email = $db->real_escape_string($_POST["email"]);
$uname = $db->real_escape_string($_POST["uname"]);
$pword = $db->real_escape_string($_POST["pword"]);
$street = strtoupper($db->real_escape_string($_POST["street"]));
$brgy = strtoupper($db->real_escape_string($_POST["brgy"]));
$city = strtoupper($db->real_escape_string($_POST["city"]));
$province = strtoupper($db->real_escape_string($_POST["province"]));

$sql1 = "SELECT * FROM tbl_users Where Username = '$uname' OR Email = '$email' LIMIT 1";
$result = mysqli_query($db, $sql1);
$fetch = mysqli_fetch_assoc($result);

if ($fetch) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Username / Email Already Exist";
    header("Location: " . $folder . "register.php");
    exit();
} else {
    $sql2 = "INSERT INTO `tbl_users`(`Username`, `Password`, `Name`, `Last_Name`, `Contact`, `Email`,`Street`,`Brgy`,`City`,`Province`) 
    VALUES ('$uname','$pword','$name','$surname','$contact','$email','$street','$brgy','$city','$province')";

    $result2 = $db->query($sql2);
    if ($result2) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Account Registered Successfuly.";
        header("Location: " . $folder . "login_user.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "There's an error parsing your request";
        header("Location: " . $folder . "register.php");
        exit();
    }
}
?>