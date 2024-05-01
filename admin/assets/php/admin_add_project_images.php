<?php
include 'config.php';
session_start();

$pid = $_POST['pid'];

$file_name = $_FILES['file']['name'];
$file_type = $_FILES['file']['type'];
$file_size = $_FILES['file']['size'];
$file_temp = $_FILES['file']['tmp_name'];

if ($file_type == "image/jpeg" || $file_type == "image/png") {
    $img_data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $sql2 = "INSERT INTO `tbl_portfolio_images`(`PI_Project`, `PI_Images`, `PI_Image_Type`) VALUES ('$pid','$img_data','$file_type')";
    if (mysqli_query($db, $sql2)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Image Successfully Added";
        header("Location: " . $folder . "admin/admin_pview.php?id=$pid");
        exit();
    }
    else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Project Already Existed";
        header("Location: " . $folder . "admin/admin_pview.php?id=$pid");
        exit();
    }
}
else{
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Invalid File Type";
    header("Location: " . $folder . "admin/admin_pview.php?id=$pid");
    exit();
}
?>
