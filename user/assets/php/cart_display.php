<?php
include 'config.php';
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo ' <tr>
            <td>
                <?= $row[]; ?>
            </td>
            <td>
                <?= $row[]; ?>
            </td>
            <td>
                <?= $row[]; ?>
            </td>
            <td>
                <?= $row[]; ?>
            </td>
        </tr>';

    }
} else {
    echo "No Item in your Cart";
}
mysqli_close($conn);
?>