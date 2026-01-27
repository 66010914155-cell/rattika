<?php
$servername = "localhost";
$username   = "root";
$password   = "chinnapat";
$dbname     = "4155db"; // ต้องมีอยู่จริง
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES utf8");

?>
