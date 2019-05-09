<?php

$servername = "remotemysql.com:3306";
$dbusername = "M5vKHHE91E";
$dbpassword = "6pNhpSeMsR";
$dbname = "M5vKHHE91E";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
   die("connection failed: ".mysqli_connect_error());
}

?>