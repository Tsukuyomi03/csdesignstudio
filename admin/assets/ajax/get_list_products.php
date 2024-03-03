<?php
include("config.php");

$sql = "SELECT * FROM tbl_products";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result)) {
    $tabledata .= '<tr>
                    <td>' . $row['ID'] . '</td>
                    <td>' . $row['P_Name'] . '</td>
                    <td>' . $row['P_Description'] . '</td>
                    <td>' . $row['P_Price'] . '</td>
                </tr>';
}
?>