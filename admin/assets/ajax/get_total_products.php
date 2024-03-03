<?php
include("config.php");

$sql = "SELECT Count(`ID`) AS total_products FROM `tbl_products` LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();
echo $row['total_products'];
$db->close();
?>