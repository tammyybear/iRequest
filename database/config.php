<?php

$servername = "files.000webhost.com";
$dbusername = "id9548842_irequest";
$dbpassword = "iRequest_12345";
$dbname = "id9548842_irequest";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
   die("connection failed: ".mysqli_connect_error());
}

?>