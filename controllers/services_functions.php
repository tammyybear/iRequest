<?php
include "database_functions.php";

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
        $query = mysqli_query($conn, "SELECT * from services_tb ORDER BY date_created DESC ");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td class="txt-oflo"><?php echo $row['ticket_id'] ?></td>
                   <td class="txt-oflo"><?php echo $row['request_subject'] ?></td>
                   <td class="txt-oflo"><?php echo getUserDetailsById($conn, $row['users_id'])[0] ?></td>
                   <td class="txt-oflo"><?php echo $row['date_created']?> </td>
                   <td class="txt-oflo"><?php echo $row['request_status']?> </td>
               </tr>
               <?php
            }
        }else{
            echo "No Ticket Found";
        }
    }
}

if(!function_exists('CheckCountService')){
    function CheckCountService($conn){
        $query = mysqli_query($conn, "SELECT * from services_tb where request_status = 'Open'");
        if(mysqli_num_rows($query) < 1){
            ?>
            <h3 class="box-title">TICKET ID: No Tickets</h3>
            <form class="form-horizontal form-material" method="post" action="services_admin_action.php"> 
                <div class="form-group">
                    <label class="col-md-12">Service Request Subject</label>
                    <div class="col-md-12">                                   
                        <input type="text" placeholder = "Service Request Subject" class="form-control form-control-line" name="request_subject" readonly>                                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Service Request Description</label>
                    <div class="col-md-12">                                                              
                        <textarea placeholder = "Service Request Description" class="form-control form-control-line" name="request_description" readonly></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Requestor Name</label>
                    <div class="col-md-12">                                        
                        <input type="text" placeholder = "Requestor Name" class="form-control form-control-line" name="requestor_name" readonly>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" disabled>Close Ticket</button>
                    </div>
                </div>
            </form>
            <?php 
        }elseif (mysqli_num_rows($query) > 0){
            ?>
            <h3 class="box-title">TICKET ID: <?php echo GetTopRequestData($conn)[5] ?></h3>
            <form class="form-horizontal form-material" method="post" action="services_admin_action.php<?php echo '?id='.GetTopRequestData($conn)[6] ?>">                            
                <div class="form-group">
                    <label class="col-md-12">Service Request Subject</label>
                    <div class="col-md-12">                                   
                        <input type="text" value="<?php echo GetTopRequestData($conn)[1] ?>" class="form-control form-control-line" name="request_subject" readonly>                                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Service Request Description</label>
                    <div class="col-md-12">                                                              
                        <textarea class="form-control form-control-line" name="request_description" readonly><?php echo GetTopRequestData($conn)[2] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Requestor</label>
                    <div class="col-md-12">                                        
                        <input type="text" value="<?php echo getUserDetailsById($conn, GetTopRequestData($conn)[0])[0] ?>" class="form-control form-control-line" name="requestor_name" readonly>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Close Ticket</button>
                    </div>
                </div>
            </form>
            <?php
        }
    }
}

?>
