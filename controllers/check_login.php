<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['role_type'])){
    header("LOCATION: index.php");
}
?>