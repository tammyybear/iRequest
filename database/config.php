<?php
$servername = "remotemysql.com:3306";
$dbusername = "rpmBWBLthY";
$dbpassword = "feGnhGfwcM";
$dbname = "rpmBWBLthY";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
   die("connection failed: ".mysqli_connect_error());
}
?>
