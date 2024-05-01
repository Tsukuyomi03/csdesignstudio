<?php
include 'config.php';
session_start();
$pname = $_POST['pname'];

$file_name = $_FILES['file']['name'];
$file_type = $_FILES['file']['type'];
$file_size = $_FILES['file']['size'];
$file_temp = $_FILES['file']['tmp_name'];

$sql = "SELECT * FROM tbl_porfolio WHERE `P_Name`='$pname'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "Project Already Existed";
    header("Location: " . $folder . "admin/admin_settings.php");
    exit();
} else {
    if ($file_type == "image/jpeg" || $file_type == "image/png") {
        $img_data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $sql2 = "INSERT INTO `tbl_porfolio`(`P_Cover`, `P_Cover_Type`, `P_Name`) VALUES ('$img_data','$file_type','$pname')";
        if (mysqli_query($db, $sql2)) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Project Added";
            header("Location: " . $folder . "admin/admin_settings.php");
            exit();
        }
        else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Project Already Existed";
            header("Location: " . $folder . "admin/admin_settings.php");
            exit();
        }
        
    }
    else{
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Invalid File Type";
        header("Location: " . $folder . "admin/admin_settings.php");
        exit();
    }
}
?>
