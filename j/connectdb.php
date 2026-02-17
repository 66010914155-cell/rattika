<?php
$host = "localhost";
$user = "root";
$pw = "chinnapat";            
$db = "4155db";
$conn = mysqli_connect($host, $user, $pw, $db) or die ("Error: " . mysqli_connect_error());
mysqli_query($conn, "SET NAMES utf8");

?>
