<?php
$folder = '/ecommerce/api';
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "csdesignstudio";

$db = mysqli_connect($hostname, $username, $password, $databasename);

if (!$db) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>