<?php
// if(!function_exists('getFacilityCalendar')){
//     function getFacilityCalendar($conn, $month, $year){
//     include "inventory_functions.php";
//     $category = "Facilities";
// 	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
// 	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
// 	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
// 	$running_day = date('w',mktime(0,0,0,$month,1,$year));
// 	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
// 	$days_in_this_week = 1;
// 	$day_counter = 0;
// 	$dates_array = array();
// 	$calendar.= '<tr class="calendar-row">';
// 	for($x = 0; $x < $running_day; $x++):
// 		$calendar.= '<td class="calendar-day-np"> </td>';
// 		$days_in_this_week++;
//     endfor;

//     $category = "Facilities";
    
// 	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
//         $calendar.= '<td class="calendar-day">';
//         // $date = $month . "-" . $list_day . "-" . $year;
//         $date = $month . "-" . $year;
// 			$calendar.= '<div class="day-number">'.$list_day.'</div>';
//             $query = mysqli_query($conn, "SELECT * from bookings_tb where category = '$category' and DATE_FORMAT(date_from_requested, '%m-%Y') >= '$date' and status = 'Approved'");
//             if(!$query){
//                 $calendar.= str_repeat('<p>' . mysqli_error($conn) . '</p>',2);
//             }else{
//                 if(mysqli_num_rows($query)>0){
//                     while($row = mysqli_fetch_array($query)){
//                         $date_from_requested = date_format(date_create($row['date_from_requested']), "d");
//                         $date_to_requested = date_format(date_create($row['date_to_requested']), "d");
//                         if($date_from_requested != $date_to_requested){
//                             $list_of_days = array();
//                             for($i = $date_from_requested; $i < $date_to_requested + 1; $i++){
//                                array_push($list_of_days, $i);
//                             }
//                             // if($list_day == $i && $list_day == $date_from_requested){
//                             //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
//                             // }elseif($list_day == $i && $list_day == $date_to_requested){
//                             //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
//                             // }else{
//                             //     $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
//                             // }

//                             if(in_array($list_day, $list_of_days) && $list_day == $date_from_requested){
//                                 $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
//                             }elseif(in_array($list_day, $list_of_days) && $list_day == $date_to_requested){
//                                 $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
//                             }elseif(!in_array($list_day, $list_of_days)){
//                                 $calendar.= str_repeat('<p></p>',1);
//                             }else{
//                                 $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
//                             }
//                         }else{
//                             if($list_day == $date_from_requested){
//                                 $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create($row['date_to_requested']), "g:i a") . '</p>',1);
    
//                             }else{
//                                 $calendar.= str_repeat('<p></p>',2);
//                             }
//                         }
//                     }
//                 }else{
//                     $calendar.= str_repeat('<p>' .'</p>',2);
//                 }
//             }
			
// 		$calendar.= '</td>';
// 		if($running_day == 6):
// 			$calendar.= '</tr>';
// 			if(($day_counter+1) != $days_in_month):
// 				$calendar.= '<tr class="calendar-row">';
// 			endif;
// 			$running_day = -1;
// 			$days_in_this_week = 0;
// 		endif;
// 		$days_in_this_week++; $running_day++; $day_counter++;
//     endfor;
    
// 	if($days_in_this_week < 8):
// 		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
// 			$calendar.= '<td class="calendar-day-np"> </td>';
// 		endfor;
// 	endif;
// 	$calendar.= '</tr>';
// 	$calendar.= '</table>';

// 	return $calendar;
//     }
// }

// if(!function_exists('getAutomobileCalendar')){
//     function getAutomobileCalendar($conn, $month, $year){
//         include "inventory_functions.php";
//         $category = "Facilities";
//         $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
//         $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
//         $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
//         $running_day = date('w',mktime(0,0,0,$month,1,$year));
//         $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
//         $days_in_this_week = 1;
//         $day_counter = 0;
//         $dates_array = array();
//         $calendar.= '<tr class="calendar-row">';
//         for($x = 0; $x < $running_day; $x++):
//             $calendar.= '<td class="calendar-day-np"> </td>';
//             $days_in_this_week++;
//         endfor;
        
//         $category = "Automobile";

//         for($list_day = 1; $list_day <= $days_in_month; $list_day++):
//             $calendar.= '<td class="calendar-day">';
//             // $date = $month . "-" . $list_day . "-" . $year;
//             $date = $month . "-" . $year;
//                 $calendar.= '<div class="day-number">'.$list_day.'</div>';
//                 $query = mysqli_query($conn, "SELECT * from bookings_tb where category = '$category' and DATE_FORMAT(date_from_requested, '%m-%Y') >= '$date' and status = 'Approved'");
//                 if(!$query){
//                     $calendar.= str_repeat('<p>' . mysqli_error($conn) . '</p>',2);
//                 }else{
//                     if(mysqli_num_rows($query)>0){
//                         while($row = mysqli_fetch_array($query)){
//                             $date_from_requested = date_format(date_create($row['date_from_requested']), "d");
//                             $date_to_requested = date_format(date_create($row['date_to_requested']), "d");
//                             if($date_from_requested != $date_to_requested){
//                                 $list_of_days = array();
//                                 for($i = $date_from_requested; $i < $date_to_requested + 1; $i++){
//                                    array_push($list_of_days, $i);
//                                 }
//                                 // if($list_day == $i && $list_day == $date_from_requested){
//                                 //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
//                                 // }elseif($list_day == $i && $list_day == $date_to_requested){
//                                 //     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
//                                 // }else{
//                                 //     $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
//                                 // }
    
//                                 if(in_array($list_day, $list_of_days) && $list_day == $date_from_requested){
//                                     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create("2019-01-01 24:00:00"), "g:i a") . '</p>',1);
//                                 }elseif(in_array($list_day, $list_of_days) && $list_day == $date_to_requested){
//                                     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' .date_format(date_create("2019-01-01 00:00:00"), "g:i a").  '-' . date_format(date_create($row['date_from_requested']), "g:i a") . '</p>',1);
//                                 }elseif(!in_array($list_day, $list_of_days)){
//                                     $calendar.= str_repeat('<p></p>',1);
//                                 }else{
//                                     $calendar.= str_repeat('<p>'. getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>'. 'Reserved All Day</p>',1);
//                                 }
//                             }else{
//                                 if($list_day == $date_from_requested){
//                                     $calendar.= str_repeat('<p>' . getInventoryDetailsById($conn, $row['inventory_item_id'])[0] . '<br>' . date_format(date_create($row['date_from_requested']), "g:i a") . '-' . date_format(date_create($row['date_to_requested']), "g:i a") . '</p>',1);
        
//                                 }else{
//                                     $calendar.= str_repeat('<p></p>',2);
//                                 }
//                             }
//                         }
//                     }else{
//                         $calendar.= str_repeat('<p>' .'</p>',2);
//                     }
//                 }
                
//             $calendar.= '</td>';
//             if($running_day == 6):
//                 $calendar.= '</tr>';
//                 if(($day_counter+1) != $days_in_month):
//                     $calendar.= '<tr class="calendar-row">';
//                 endif;
//                 $running_day = -1;
//                 $days_in_this_week = 0;
//             endif;
//             $days_in_this_week++; $running_day++; $day_counter++;
//         endfor;
//         if($days_in_this_week < 8):
//             for($x = 1; $x <= (8 - $days_in_this_week); $x++):
//                 $calendar.= '<td class="calendar-day-np"> </td>';
//             endfor;
//         endif;
//         $calendar.= '</tr>';
//         $calendar.= '</table>';
    
//         return $calendar;
//         }
// }

if(!function_exists('getFacilityCalendar')){
    function getFacilityCalendar(){
        ?>
            <script src='../resources/js/jquery-1.10.2.js' type="text/javascript"></script>
            <script src='../resources/js/jquery-ui.custom.min.js' type="text/javascript"></script>
            <script src='../resources/js/fullcalendar.js' type="text/javascript"></script>
            <script>

                $(document).ready(function() {
                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    /*  className colors

                    className: default(transparent), important(red), chill(pink), success(green), info(blue)

                    */


                    /* initialize the external events
                    -----------------------------------------------------------------*/

                    $('#external-events div.external-event').each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 999,
                            revert: true,      // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });


                    /* initialize the calendar
                    -----------------------------------------------------------------*/

                    var calendar =  $('#calendar').fullCalendar({
                        header: {
                            left: 'title',
                            center: 'agendaDay,agendaWeek,month',
                            right: 'prev,next today'
                        },
                        editable: false,
                        firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
                        selectable: false,
                        defaultView: 'month',

                        axisFormat: 'h:mm',
                        columnFormat: {
                            month: 'ddd',    // Mon
                            week: 'ddd d', // Mon 7
                            day: 'dddd M/d',  // Monday 9/7
                            agendaDay: 'dddd d'
                        },
                        titleFormat: {
                            month: 'MMMM yyyy', // September 2009
                            week: "MMMM yyyy", // September 2009
                            day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
                        },
                        allDaySlot: false,
                        selectHelper: true,
                        select: function(start, end, allDay) {
                            var title = prompt('Event Title:');
                            if (title) {
                                calendar.fullCalendar('renderEvent',
                                    {
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    },
                                    true // make the event "stick"
                                );
                            }
                            calendar.fullCalendar('unselect');
                        },
                        droppable: true, // this allows things to be dropped onto the calendar !!!
                        drop: function(date, allDay) { // this function is called when something is dropped

                            // retrieve the dropped element's stored Event Object
                            var originalEventObject = $(this).data('eventObject');

                            // we need to copy it, so that multiple events don't have a reference to the same object
                            var copiedEventObject = $.extend({}, originalEventObject);

                            // assign it the date that was reported
                            copiedEventObject.start = date;
                            copiedEventObject.allDay = allDay;

                            // render the event on the calendar
                            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                            // is the "remove after drop" checkbox checked?
                            if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(this).remove();
                            }

                        },

                        events: [
                            {
                                title: 'All Day Event',
                                start: new Date(y, m, 1)
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: new Date(y, m, d-3, 16, 0),
                                allDay: false,
                                className: 'info'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: new Date(y, m, d+4, 16, 0),
                                allDay: false,
                                className: 'info'
                            },
                            {
                                title: 'Meeting',
                                start: new Date(y, m, d, 10, 30),
                                allDay: false,
                                className: 'important'
                            },
                            {
                                title: 'Lunch',
                                start: new Date(y, m, d, 12, 0),
                                end: new Date(y, m, d, 14, 0),
                                allDay: false,
                                className: 'important'
                            },
                            {
                                title: 'Birthday Party',
                                start: new Date(y, m, d+1, 19, 0),
                                end: new Date(y, m, d+1, 22, 30),
                                allDay: false,
                            },
                            {
                                title: 'Click for Google',
                                start: new Date(y, m, 28),
                                end: new Date(y, m, 29),
                                url: 'http://google.com/',
                                className: 'success'
                            }
                        ],
                    });


                });

            </script>
        <?php
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
                <option value = "<?php echo $row['inventory_item_id'] ?>"><?php echo $row['item_name'] ?></option>
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
        $query = mysqli_query($conn, "SELECT * from bookings_tb where users_id = '$user_id' ORDER BY date_from_requested ASC");      
        if(! $query){
            echo mysqli_error($conn);
        }else{
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){
                    ?>
                     <tr>
                        <td class="txt-oflo"><?php echo getInventoryDetailsById($conn, $row['inventory_item_id'])[0]?></td>
                        <td class="txt-oflo"><?php echo $row['date_from_requested'] ?></td>
                        <td class="txt-oflo"><?php echo $row['date_to_requested'] ?></td>
                        <td class="txt-oflo"><?php echo $row['status'] ?></td>
                        <td class="txt-oflo"><?php echo $row['category'] ?></td>                    
                    </tr>
                    <?php
                }
            }else{
                echo "No Users Found";
            }
        }
    }
}
?>