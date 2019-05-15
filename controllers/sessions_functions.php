<?php
if(!isset($_SESSION['role_type'])) {
    redirectPageWithAlert("index.php", "Please login to continue");
}
?>