<?php

session_start();
unset($_SESSION['role_type']);
unset($_SESSION['user']);
session_destroy();
header("Location: index.php");

?>