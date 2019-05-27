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
        get_NavBlade_mobile();
       ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Scheduling</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active">Scheduling</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box" id="choose_buttons">
                            <h3 class="box-title">Select Reservation</h3>
                            <div class="form-group"></div>
                            <div class="form-group">
                                <center>
                                    <label class="col-md-12">Reservation for Automobile</label>
                                    <button id="automobile" class="btn btn-success" onclick = "showCalendar('Automobile')">  Select </button>                                  
                                </center>
                            </div>
                            <div class="form-group">
                                <center>
                                    <label class="col-md-12">Reservation for Facilities &nbsp &nbsp &nbsp</label>
                                    <button id="facility" class="btn btn-success" onclick = "showCalendar('Facilities')">  Select </button>                                  
                                </center
                            ></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container" id="facility_calendar" style="display:none">
                        <div class="col-md-4 col-xs-12">                            
                            <?php echo getFacilityCalendar($conn, date("m"), date("Y")); ?>
                        </div>
                        <div class="col-md-2 col-xs-12"></div>
                        <div class="col-md-6 col-xs-12">
                            <div class="white-box">
                                <?php $category = "Facilities"; getReservationForm($conn, $category) ?>
                                <button class="btn btn-danger" onclick = "hideCalendar()">Choose Again</button>                                                            
                            </div>
                        </div>
                    </div>
                    <div class="container" id="automobile_calendar" style="display:none">
                        <div class="col-md-4 col-xs-12">                            
                            <?php echo getAutomobileCalendar($conn, date("m"), date("Y")); ?>
                        </div>
                        <div class="col-md-2 col-xs-12"></div>
                        <div class="col-md-6 col-xs-12">
                            <div class="white-box">
                                <?php $category = "Automobile"; getReservationForm($conn, $category) ?>
                                <button class="btn btn-danger" onclick = "hideCalendar()">Choose Again</button>                                
                            </div>
                        </div>
                    </div>                                      
                </div>

                <div class="row" id="table_list">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">My Reservation List</h3>
                            <div class="col-md-2 col-sm-4 col-xs-12 pull-right"> </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Reserved Automobile / Facility</th>
                                            <th>Reservation Date Start</th>
                                            <th>Reservation Date End</th>
                                            <th>Reservation Status</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            getUsersReservationData_mobile($conn);
                                        ?>
                                    </tbody>
                                </table></div>
                        </div>
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
            document.getElementById("table_list").style.display = "none";
          }else{
            document.getElementById("automobile_calendar").style.display = "block";
            document.getElementById("table_list").style.display = "none";
          }
      }

      function hideCalendar(){
        document.getElementById("table_list").style.display = "block";
        document.getElementById("choose_buttons").style.display = "block";
        document.getElementById("facility_calendar").style.display = "none";
        document.getElementById("automobile_calendar").style.display = "none";
      }
      </script>
      
</body>

</html>
