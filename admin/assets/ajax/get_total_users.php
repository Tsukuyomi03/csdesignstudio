<?php
include("config.php");

$sql = "SELECT Count(`ID`) AS total_users FROM `tbl_users` LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();
echo $row['total_users'];
$db->close();
?>