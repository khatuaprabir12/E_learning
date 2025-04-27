<?php
$host = 'localhost'; // or your database host
$user = 'root'; // your database username
$password = ''; // your database password
$database = 'your_database_name'; // your database name

$connect = new mysqli($host, $user, $password, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
