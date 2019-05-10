<?php
session_start();
if(!function_exists('get_FooterBlade')){
    function get_FooterBlade(){
        ?>
        <footer class="footer text-center"> 2019 &copy; I-Request | OLFU MIT </footer>
        <?php
    }
}

if(!function_exists('get_headBlade')){
    function get_headBlade(){
        ?>
            <title>I-Request</title>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">        
            <meta name="description" content="I-Request">
            <meta name="author" content="">

            <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">

            <!-- Bootstrap Core CSS -->
            <link rel="stylesheet" href="resources/bootstrap/dist/css/bootstrap.min.css" >
            <!-- Menu CSS -->
            <link rel="stylesheet" href="resources/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" >
            <!-- toast CSS -->
            <link rel="stylesheet" href="resources/plugins/bower_components/toast-master/css/jquery.toast.css" >
            <!-- morris CSS -->
            <link rel="stylesheet" href="resources/plugins/bower_components/morrisjs/morris.css" >
            <!-- animation CSS -->
            <link rel="stylesheet" href="resources/css/animate.css" >
            <!-- Custom CSS -->
            <link rel="stylesheet" href="resources/css/style.css" >
            <link rel="stylesheet" href="resources/plugins/datatable.css" >
            <link href="resources/plugins/bootstrap_select/css/bootstrap-select.min.css" >
            <!-- color CSS -->
            <link rel="stylesheet" id="theme" href="resources/css/colors/blue-dark.css" >

            <!-- [if lt IE 9]> -->
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

        <?php
    }
}

if(!function_exists('get_JSBlade')){
    function get_JSBlade(){
        ?>
            <script src="resources/plugins/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="resources/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- Menu Plugin JavaScript -->
            <script src="resources/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
            <!--slimscroll JavaScript -->
            <script src="resources/js/jquery.slimscroll.js"></script>
            <!--Wave Effects -->
            <script src="resources/js/waves.js"></script>
            <!--Counter js -->
            <script src="resources/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
            <script src="resources/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
            <!--Morris JavaScript -->
            <script src="resources/plugins/bower_components/raphael/raphael-min.js"></script>
            <script src="resources/plugins/bower_components/morrisjs/morris.js"></script>
            <script src="resources/plugins/datatable.min.js"></script>
            <!-- Custom Theme JavaScript -->
            <script src="resources/js/custom.min.js"></script>
            <script src="resources/plugins/bootstrap_select/js/bootstrap-select.min.js"></script>
            <script src="resources/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
            <script src="https://unpkg.com/sweetalert2@7.1.2/dist/sweetalert2.all.js"></script>

        <?php
    }
}

if(!function_exists('get_NavBlade')){
    function get_NavBlade(){
        if(isset($_SESSION['role_type'])) {
            if($_SESSION['role_type'] == "Admin"){
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                        <ul class="nav" id="side-menu">
                            <li style="padding: 10px 0 0;">
                                <a href="admin_dashboard.php" class="waves-effect"><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="schedules.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
                            </li>
                            <li>
                                <a href="services.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                            </li>
                            <li>
                                <a href="facilities.php" class="waves-effect"><i class="fa fa-building fa-fw" aria-hidden="true"></i><span class="hide-menu">Facilities</span></a>
                            </li>
                            <li>
                                <a href="auotmobiles.php" class="waves-effect"><i class="fa fa-car fa-fw" aria-hidden="true"></i><span class="hide-menu">Automobiles</span></a>
                            </li>
                            <li>
                                <a href="departments.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Departments</span></a>
                            </li>
                            <li>
                                <a href="user_management.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">User Management</span></a>
                            </li>
                            <li>
                                <a href="logout_action.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
                            </li>  
                        </ul>
                    </div>
                </div>
                <?php
            }elseif($_SESSION['role_type'] == "Department Head"){
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                        <ul class="nav" id="side-menu">
                            <li style="padding: 10px 0 0;">
                                <a href="department_head_dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="schedules.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
                            </li>
                            <li>
                                <a href="services.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                            </li>
                            <li>
                                <a href="user_management.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">User Management</span></a>
                            </li>
                            <li>
                                <a href="logout_action.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
                            </li>  
                        </ul>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                        <ul class="nav" id="side-menu">
                            <li style="padding: 10px 0 0;">
                                <a href="department_member_dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
                            </li>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                            </li>
                            <li>
                                <a href="logout_action.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
                            </li>  
                        </ul>
                    </div>
                </div>
                <?php
            }
        }
    }
}
?>