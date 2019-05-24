<?php
session_start();

if(!function_exists('get_FooterBlade')){
    function get_FooterBlade(){
        ?>
        <footer class="footer text-center"> 2019 &copy; I-Request | OLFU MIT </footer>
        <?php
    }
}

if(!function_exists('getHeaderUserName')) {
    function getHeaderUserName() {
        include "database/config.php";
        include "users_functions.php";
        $username = $_SESSION['user'];
        if($username == 'iRequest') {
        ?>
            <a class="profile-pic" href="edit_user.php">
                <img src="resources/images/avatar.jpg" alt="avatar" width="36" class="img-circle">
                <b class="hidden-xs">Administrator</b>
            </a>
        <?php
        }else{
            $firstname = getUserDetailsByUsername($conn, $username)[0];
        ?>
            <a class="profile-pic" href="edit_user.php<?php echo '?id='.getUserDetailsByUsername($conn, $username)[11]; ?>">
                <img src="resources/images/avatar.jpg" alt="avatar" width="36" class="img-circle">
                <b class="hidden-xs"><?php echo $firstname ?></b>
            </a>
        <?php
        }                       
    }
}

if(!function_exists('getHeaderUserName_mobile')) {
    function getHeaderUserName_mobile() {
        include "../database/config.php";
        include "users_functions.php";
        $username = $_SESSION['user'];
        $firstname = getUserDetailsByUsername($conn, $username)[0];
        ?>
            <a class="profile-pic" href="edit_user_mobile.php">
                <img src="../resources/images/avatar.jpg" alt="avatar" width="36" class="img-circle">
                <b class="hidden-xs"><?php echo getUserDetailsByUsername($conn, $username)[1]; ?></b>
            </a>
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

            <link rel="icon" type="image/png" sizes="16x16" href="resources/images/favicon.png">

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

if(!function_exists('get_headBlade_mobile')){
    function get_headBlade_mobile(){
        ?>
            <title>I-Request</title>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">        
            <meta name="description" content="I-Request">
            <meta name="author" content="">

            <link rel="icon" type="image/png" sizes="16x16" href="../resources/images/favicon.png">

            <!-- Bootstrap Core CSS -->
            <link rel="stylesheet" href="../resources/bootstrap/dist/css/bootstrap.min.css" >
            <!-- Menu CSS -->
            <link rel="stylesheet" href="../resources/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" >
            <!-- toast CSS -->
            <link rel="stylesheet" href="../resources/plugins/bower_components/toast-master/css/jquery.toast.css" >
            <!-- morris CSS -->
            <link rel="stylesheet" href="../resources/plugins/bower_components/morrisjs/morris.css" >
            <!-- animation CSS -->
            <link rel="stylesheet" href="../resources/css/animate.css" >
            <!-- Custom CSS -->
            <link rel="stylesheet" href="../resources/css/style.css" >
            <link rel="stylesheet" href="../resources/plugins/datatable.css" >
            <link href="../resources/plugins/bootstrap_select/css/bootstrap-select.min.css" >
            <!-- color CSS -->
            <link rel="stylesheet" id="theme" href="../resources/css/colors/blue-dark.css" >            

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

if(!function_exists('get_JSBlade_mobile')){
    function get_JSBlade_mobile(){
        ?>
            <script src="../resources/plugins/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="../resources/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- Menu Plugin JavaScript -->
            <script src="../resources/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
            <!--slimscroll JavaScript -->
            <script src="../resources/js/jquery.slimscroll.js"></script>
            <!--Wave Effects -->
            <script src="../resources/js/waves.js"></script>
            <!--Counter js -->
            <script src="../resources/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
            <script src="../resources/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
            <!--Morris JavaScript -->
            <script src="../resources/plugins/bower_components/raphael/raphael-min.js"></script>
            <script src="../resources/plugins/bower_components/morrisjs/morris.js"></script>
            <script src="../resources/plugins/datatable.min.js"></script>
            <!-- Custom Theme JavaScript -->
            <script src="../resources/js/custom.min.js"></script>
            <script src="../resources/plugins/bootstrap_select/js/bootstrap-select.min.js"></script>
            <script src="../resources/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
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
                                <a href="dashboard_admin.php" class="waves-effect"><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a href="reservations_admin.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Reservations</span></a>
                            </li>
                            <li>
                                <a href="services_admin.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                            </li>
                            <li>
                                <a href="facilities.php" class="waves-effect"><i class="fa fa-building fa-fw" aria-hidden="true"></i><span class="hide-menu">Facilities</span></a>
                            </li>
                            <li>
                                <a href="automobiles.php" class="waves-effect"><i class="fa fa-car fa-fw" aria-hidden="true"></i><span class="hide-menu">Automobiles</span></a>
                            </li>
                            <li>
                                <a href="department.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Departments</span></a>
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
                                    <a href="dashboard_department_head.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="schedules_dept_head.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Reservations</span></a>
                                </li>
                                <li>
                                    <a href="services_user.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
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
                include "users_functions.php";
                ?>
                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                            <ul class="nav" id="side-menu">
                                <li style="padding: 10px 0 0;">
                                    <a href="edit_user.php<?php echo '?id='.getUserDetailsByUsername($conn, $username)[11]; ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                                </li>                                
                                <li>
                                    <a href="logout_action.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
                                </li>  
                            </ul>
                        </div>
                    </div>
                <?php
            }            
        }else{
            ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                        <ul class="nav" id="side-menu">
                            <li style="padding: 10px 0 0;">
                                <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Login Page</span></a>
                            </li>
                            <li>
                                <a href="mobile_app/installer/iRequest.apk" download class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Download App</span></a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            <?php
        }
    }
}


if(!function_exists('get_NavBlade_mobile')){
    function get_NavBlade_mobile(){
        if(isset($_SESSION['role_type'])) {
            if($_SESSION['role_type'] == "Department Member"){
                ?>
                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                            <ul class="nav" id="side-menu">
                                <li style="padding: 10px 0 0;">
                                    <a href="dashboard_department_member.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="reserve_first_step.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Reservation</span></a>
                                </li>
                                <li>
                                    <a href="services_user_mobile.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                                </li>
                                <li>
                                    <a href="logout_action_mobile.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
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
                                    <a href="dashboard_department_head_mobile.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="reserve_first_step.php" class="waves-effect"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
                                </li>
                                <li>
                                    <a href="services_user_mobile.php" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                                </li>
                                <li>
                                    <a href="user_management_mobile.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">User Management</span></a>
                                </li>
                                <li>
                                    <a href="logout_action_mobile.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
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