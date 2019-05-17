<?php

if(!function_exists('get_TicketId')){
    function get_TicketId($conn){
        $keyLength = 8;
        $strings = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $TicketId = substr(str_shuffle($strings), 0, $keyLength);
        $CheckTicketId = CheckTicketId($conn, $TicketId);
        while ($CheckTicketId == true) {
            $TicketId = substr(str_shuffle($strings), 0, $keyLength);
            $CheckTicketId = CheckTicketId($conn, $TicketId);
        }
        return $TicketId;
    }
}

if(!function_exists('CheckTicketId')){
    function CheckTicketId($conn, $TicketId){
        if(countResult($conn, "SELECT * from services_tb where ticket_id = '$TicketId'") == 1){
            $keyExists = true;
        }else{
            $keyExists = false;
        }
        return $keyExists;
    }
}

?>
