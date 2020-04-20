<?php
$servername = "remotemysql.com:3306";
$dbusername = "DF84qdcFzw";
$dbpassword = "r7x6pojvx5";
$dbname = "DF84qdcFzw";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
   die("connection failed: ".mysqli_connect_error());
}
?>
