<?php

session_start();
unset($_SESSION['role_type']);
session_destroy();
header("Location: ../login.php");

?>