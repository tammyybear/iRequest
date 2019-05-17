<?php
session_start();
include "database/config.php";
include "controllers/check_login.php";
include "controllers/database_functions.php";

if(!function_exists('get_TicketId')){
    function get_TicketId(){
        $TicketId = uniqid('iRequest_', true);
        return $TicketId;
    }
}

?>