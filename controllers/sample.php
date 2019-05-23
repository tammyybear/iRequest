<?php
include "../database/config.php";
include "bookings_functions.php";

?>

<html>
    <head>
    <style>
       .automobile{
           background-image: url('../resources/images/automobile.jpg');
           width: 100%;
           height:100%;
           padding:100px;
           background-size: 100% 100%;
           border-style: none;
       }
       .facility{
           background-image: url('../resources/images/facility.jpg');
           width: 100%;
           height:100%;
           padding:100px;
           background-size: 100% 100%;
           border-style: none;
       }
       <style>
        table.calendar		{ border-left:1px solid #999; }
        tr.calendar-row	{  }
        td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
        td.calendar-day:hover	{ background:#eceff5; }
        td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
        td.calendar-day-head {background: #85b4d0;font-weight:bold;text-align:center;width:80px;padding:1.5px;border-bottom:1px solid #999;border-top:1px solid #999;border-right:1px solid #999;color: white;}
        div.day-number		{background: #85b4d0;padding: 1px;color:#fff;font-weight:bold;float:right;margin: -5px -5px 0 0;width:20px;text-align:center;}
        /* shared */
        td.calendar-day, td.calendar-day-np { width:80px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
    </style>
</head>
<body>
<?php
                           echo getFacilityCalendar($conn, date("m"), date("Y"));
                           echo getAutomobileCalendar($conn, date("m"), date("Y"));
                       ?>
    </body>
</html>