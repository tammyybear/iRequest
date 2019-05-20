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

if(!function_exists('GetTopRequestData')){
    function GetTopRequestData($conn){
        $request_details = array();        
        $query = mysqli_query($conn, "SELECT * from services_tb where request_status = 'Open' ORDER BY date_created ASC LIMIT 1");        
        while($row = mysqli_fetch_array($query)){
            array_push($request_details, $row['users_id'], $row['request_subject'], $row['request_description'], $row['request_status'], $row['date_created'], $row['ticket_id'], $row['services_id']);
        }
        
        return $request_details;
    }
}

if(!function_exists('getServiceData')){
    function getServiceData($conn){
        $query = mysqli_query($conn, "SELECT * from services_tb where request_status = 'Open' ORDER BY date_created ASC ");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td class="txt-oflo"><?php echo $row['ticket_id'] ?></td>
                   <td class="txt-oflo"><?php echo $row['request_subject'] ?></td>
                   <td class="txt-oflo"><?php echo getUserDetailsById($conn, GetTopRequestData($conn)[0])[0] ?></td>
                   <td class="txt-oflo"><?php echo $row['date_created']?> </td>
               </tr>
               <?php
            }
        }else{
            echo "No Department Found";
        }
    }
}

?>
