<?php
$servername = "sql12.freesqldatabase.com:3306";
$dbusername = "sql12354454";
$dbpassword = "DBBd5FNWen";
$dbname = "sql12354454";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
   die("connection failed: ".mysqli_connect_error());
}
?>
