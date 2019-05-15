<?php
include "controllers/basic_functions.php";

$servername = "remotemysql.com:3306";
$dbusername = "M5vKHHE91E";
$dbpassword = "6pNhpSeMsR";
$dbname = "M5vKHHE91E";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
   die("connection failed: ".mysqli_connect_error());
}

if(!isset($_SESSION['role_type'])) {
    redirectPageWithAlert("index.php", "Please login to continue");
}

?>