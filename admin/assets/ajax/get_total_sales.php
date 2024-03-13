<?php
include("config.php");

$sql = "SELECT SUM(Order_Total) AS `Total_Sales` FROM tbl_orders WHERE Order_Status ='Completed'";
$result = $db->query($sql);
$totalSales = $result->fetch_assoc();
echo $totalSales['Total_Sales'];
$db->close();

?>