<?php
if(!function_exists('getFacilityCalendar')){
    function getFacilityCalendar($conn, $month, $year){
    include "inventory_functions.php";
    $category = "Facilities";
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	$calendar.= '<tr class="calendar-row">';
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
    endfor;
    
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        $calendar.= '<td class="calendar-day">';
        // $date = $month . "-" . $list_day . "-" . $year;
        $date = $month . "-" . $year;
			$calendar.= '<div class="day-number">'.$list_day.'</div>';
            $query = mysqli_query($conn, "SELECT * from bookings_tb where category = '$category' and DATE_FORMAT(date_from_requested, '%m-%Y') >= '$date' and (status = 'Approve' or status = 'Pending')");
            if(!$query){
                $calendar.= str_repeat('<p>' . mysqli_error($conn) . '</p>',2);
            }else{
                if(mysqli_num_rows($query)>0){
                    while($row = mysqli_fetch_array($query)){
                        $date_from_requested = date_format(date_create($row['date_from_requested']), "d");
                        $date_to_requested = date_format(date_create($row['date_to_requested']), "d");
                        if($date_from_requested != $date_to_requested){
                            $list_of_days = array();
                            for($i = $date_from_requested; $i < $date_to_requested + 1; $i++){
                               array_push($list_of_days, $i);
                            }
                            // if($list_day == $i && $list_day == $date_from_requested){
                            //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
                            // }elseif($list_day == $i && $list_day == $date_to_requested){
                            //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
                            // }else{
                            //     $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
                            // }

                            if(in_array($list_day, $list_of_days) && $list_day == $date_from_requested){
                                $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
                            }elseif(in_array($list_day, $list_of_days) && $list_day == $date_to_requested){
                                $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
                            }elseif(!in_array($list_day, $list_of_days)){
                                $calendar.= str_repeat('<p></p>',1);
                            }else{
                                $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
                            }
                        }else{
                            if($list_day == $date_from_requested){
                                $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create($row['date_to_requested']), "g:i a") . '</p>',1);
    
                            }else{
                                $calendar.= str_repeat('<p></p>',2);
                            }
                        }
                    }
                }else{
                    $calendar.= str_repeat('<p>' .'</p>',2);
                }
            }
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;
	$calendar.= '</tr>';
	$calendar.= '</table>';

	return $calendar;
    }
}

if(!function_exists('getAutomobileCalendar')){
    function getAutomobileCalendar($conn, $month, $year){
    include "inventory_functions.php";
    $category = "Automobile";
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	$calendar.= '<tr class="calendar-row">';
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
    endfor;
    
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        $calendar.= '<td class="calendar-day">';
        // $date = $month . "-" . $list_day . "-" . $year;
        $date = $month . "-" . $year;
			$calendar.= '<div class="day-number">'.$list_day.'</div>';
            $query = mysqli_query($conn, "SELECT * from bookings_tb where category = '$category' and DATE_FORMAT(date_from_requested, '%m-%Y') >= '$date' and (status = 'Approve' or status = 'Pending')");
            if(!$query){
                $calendar.= str_repeat('<p>' . mysqli_error($conn) . '</p>',2);
            }else{
                if(mysqli_num_rows($query)>0){
                    while($row = mysqli_fetch_array($query)){
                        $date_from_requested = date_format(date_create($row['date_from_requested']), "d");
                        $date_to_requested = date_format(date_create($row['date_to_requested']), "d");
                        if($date_from_requested != $date_to_requested){
                            $list_of_days = array();
                            for($i = $date_from_requested; $i < $date_to_requested + 1; $i++){
                               array_push($list_of_days, $i);
                            }
                            // if($list_day == $i && $list_day == $date_from_requested){
                            //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
                            // }elseif($list_day == $i && $list_day == $date_to_requested){
                            //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
                            // }else{
                            //     $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
                            // }

                            if(in_array($list_day, $list_of_days) && $list_day == $date_from_requested){
                                $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
                            }elseif(in_array($list_day, $list_of_days) && $list_day == $date_to_requested){
                                $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
                            }elseif(!in_array($list_day, $list_of_days)){
                                $calendar.= str_repeat('<p></p>',1);
                            }else{
                                $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
                            }
                        }else{
                            if($list_day == $date_from_requested){
                                $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create($row['date_to_requested']), "g:i a") . '</p>',1);
    
                            }else{
                                $calendar.= str_repeat('<p></p>',2);
                            }
                        }
                    }
                }else{
                    $calendar.= str_repeat('<p>' .'</p>',2);
                }
            }
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;
	$calendar.= '</tr>';
	$calendar.= '</table>';

	return $calendar;
    }
}

if(!function_exists('getFacilitiesDropDown')){
    function getFacilitiesDropDown($conn){
        $query = mysqli_query($conn, "SELECT * from inventory_items_tb where inventory_cat_id = '1'");
        ?>
        <select name = "inventory_item" class="form-control form-control-line" required>
        <?php
        while($row = mysqli_fetch_array($query)){
            ?>
                <option value = "<?php echo $row['inventory_item_id'] ?>"><?php echo $row['item_name'] ?></option>
            <?php   
        }  
        ?>
        </select>
        <?php   
    }
}

if(!function_exists('getAutomobileDropDown')){
    function getAutomobileDropDown($conn){
        $query = mysqli_query($conn, "SELECT * from inventory_items_tb where inventory_cat_id = '2'");
        ?>
        <select name = "inventory_item"  class="form-control form-control-line" required>
        <?php
        while($row = mysqli_fetch_array($query)){
            ?>
                <option value = "<?php echo $row['inventory_item_id'] ?>"><?php echo $row['item_name']." - ".$row['item_description'] ?></option>
            <?php   
        }  
        ?>
        </select>
        <?php   
    }
}

if(!function_exists('getReservationForm')){
    function getReservationForm($conn, $category){
        ?>
        <form class="form-horizontal form-material" method="post" action="reserve_action.php">
            <div class="form-group">
                <label class="col-md-12"><?php echo $category ?> to Reserve</label>
                <div class="col-md-12">
                     <?php
                        if($category == "Facilities"){
                            getFacilitiesDropDown($conn);
                        }else{
                            getAutomobileDropDown($conn);
                        }
                     ?>
                </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="col-md-12">Reservation Start Date</label>
                <div class="col-md-12">
                    <input type="datetime-local" class="form-control form-control-line" name="date_from_requested" required> </div>
                    <input type = "hidden" name = "category" value = "<?php echo $category ?>" required>
            </div>
            <div class="form-group">
                <label class="col-md-12">Reservation End Date</label>
                <div class="col-md-12">
                    <input type="datetime-local" class="form-control form-control-line" name="date_to_requested" required> </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success" name="Login">Send Reservation Schedule</button>
                </div>
            </div>
        </form>
        <?php
    }
}

if(!function_exists('getUsersReservationData_mobile')){
    function getUsersReservationData_mobile($conn){
        include "users_functions.php";
        include "inventory_functions.php";
        $user_id = getUserDetailsByUsername($conn, $_SESSION['user'])[11];
        $query = mysqli_query($conn, "SELECT * from bookings_tb where users_id = '$user_id' ORDER BY date_from_requested DESC");      
        if(! $query){
            echo mysqli_error($conn);
        }else{
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){
                    ?>
                     <tr>
                        <td class="txt-oflo"><?php echo getInventoryDetailsById($conn, $row['inventory_item_id'])[0]." - ".getInventoryDetailsById($conn, $row['inventory_item_id'])[1]?></td>
                        <td class="txt-oflo"><?php echo $row['date_from_requested'] ?></td>
                        <td class="txt-oflo"><?php echo $row['date_to_requested'] ?></td>
                        <td class="txt-oflo"><?php echo $row['status'] ?></td>
                        <td class="txt-oflo"><?php echo $row['category'] ?></td>                    
                    </tr>
                    <?php
                }
            }else{
                echo "No Reservations Found";
            }
        }
    }
}

if(!function_exists('getAllReservationData')){
    function getAllReservationData($conn){
        include "users_functions.php";
        include "inventory_functions.php";
        $today = date("Y-m-d H:i:s");
        $query = mysqli_query($conn, "SELECT * FROM bookings_tb where date_from_requested >= '$today' ORDER BY date_from_requested ASC");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td class="txt-oflo"><?php echo getUserDetailsById($conn, $row['users_id'])[0] ?></td>                     
                    <td class="txt-oflo"><?php echo getInventoryDetailsById($conn, $row['inventory_item_id'])[0]." - ".getInventoryDetailsById($conn, $row['inventory_item_id'])[1]?></td>
                    <td class="txt-oflo"><?php echo $row['date_from_requested'] ?></td>
                    <td class="txt-oflo"><?php echo $row['date_to_requested'] ?></td>
                    <!-- <td class="txt-oflo"><?php echo $row['status'] ?></td> -->
                    <td class="txt-oflo"><?php echo $row['category'] ?></td>
                    <td class="txt-oflo">
                        <?php
                            if($row['status'] == "Pending"){
                                ?>
                                    <a class = "btn btn-primary" href="reservations_admin_action.php<?php echo '?id='.$row['booking_id'] . '&checker=1' . '&item='.$row['inventory_item_id'] . '&from=' .$row['date_from_requested'] . '&to=' .$row['date_to_requested']; ?>">Approve</a>
                                    <a class = "btn btn-danger" href="reservations_admin_action.php<?php echo '?id='.$row['booking_id'] & '&checker=2'; ?>">Disapprove</a>
                                <?php
                            }else{
                                echo $row['status'];
                            }
                        ?>
                    </td> 
               </tr>
               <?php
            }
        }else{
            echo "No Reservations Found";
        }
    }
}
?>
