<?php
include "../controllers/include_partial_functions.php";
include "../controllers/check_login.php";
include "../controllers/bookings_functions.php";
include "../database/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php get_headBlade_mobile(); ?>
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
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" alt="logo">
                        <b><img src="../resources/images/logo.png"/></b>
                        <small class="hidden-xs"><b>request</b></small>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>                    
                        <?php getHeaderUserName_mobile(); ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
       <?php 
        get_NavBlade();
       ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" id="choose_buttons">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center;font-weight:bold;">
                        Process Reservation for:
                            <br>
                            <br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <button id="automobile" class="automobile" onclick = "showCalendar('Automobile')">
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center;">
                        <br>
                       OR
                       <br>
                       <br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <button id="facility" class="facility" onclick = "showCalendar('Facilities')">
                        </button>
                       </div>
                </div>

                <div class="row" id="facility_calendar" style = "display:none;">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id = "calendar">
                       <?php
                           echo getFacilityCalendar($conn, date("m"), date("Y"));
                       ?>
                            
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <p></p>
                        <br>
                        <br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <form class="form-horizontal form-material" method="post" action="reserve_action.php">
                                <div class="form-group">
                                    <label class="col-md-12">What to Reserve?</label>
                                    <div class="col-md-12">
                                    <?php
                                        getFacilitiesDropDown($conn);
                                    ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Reserve From</label>
                                    <div class="col-md-12">
                                        <input type="datetime-local" class="form-control form-control-line" name="date_from_requested" id="example-email" required> </div>
                                        <input type = "hidden" name = "category" value = "Facilities" required>
                                    </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Reserve To</label>
                                    <div class="col-md-12">
                                        <input type="datetime-local" class="form-control form-control-line" name="date_to_requested" id="example-email" required> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="Login">Send Request</button>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-success" onclick = "hideCalendar()">Choose Again</button>
                    </div>
                    
                </div>

                <div class="row" id="automobile_calendar" style = "display:none;">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id = "calendar">
                       <?php
                            echo getAutomobileCalendar($conn, date("m"), date("Y"));
                       ?>
                            
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <p></p>
                        <br>
                        <br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <form class="form-horizontal form-material" method="post" action="reserve_action.php">
                                <div class="form-group">
                                    <label class="col-md-12">What to Reserve?</label>
                                    <div class="col-md-12">
                                    <?php
                                        getAutomobileDropDown($conn);
                                    ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Reserve From</label>
                                    <div class="col-md-12">
                                        <input type="datetime-local" class="form-control form-control-line" name="date_from_requested" id="example-email" required> </div>
                                        <input type = "hidden" name = "category" value = "Automobile" required>
                                    </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Reserve To</label>
                                    <div class="col-md-12">
                                        <input type="datetime-local" class="form-control form-control-line" name="date_to_requested" id="example-email" required> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="Login">Send Request</button>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-success" onclick = "hideCalendar()">Choose Again</button>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
  <?php 
    get_JSBlade_mobile();
  ?>
  <script>
      function showCalendar(category){
        document.getElementById("choose_buttons").style.display = "none";
          if(category == "Facilities"){
            document.getElementById("facility_calendar").style.display = "block";
          }else{
            document.getElementById("automobile_calendar").style.display = "block";
          }
      }

      function hideCalendar(){
        document.getElementById("choose_buttons").style.display = "block";
        document.getElementById("facility_calendar").style.display = "none";
        document.getElementById("automobile_calendar").style.display = "none";
      }
      </script>
</body>

</html>
