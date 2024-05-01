<?php
include "config.php";

$sql = "SELECT * FROM tbl_porfolio LEFT JOIN tbl_portfolio_images ON tbl_porfolio.P_ID = tbl_portfolio_images.PI_Project";
$result = $db->query($sql);

$arr=[];
while($row=$result->fetch_assoc()){
    
	$arr[$row['P_ID']]['city']=$row['city'];
	$arr[$row['P_ID']]['parent_id']=$row['PI_Img'];
}
print_r($arr)
?>
