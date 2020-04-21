<?php
include "../controllers/include_partial_functions.php";
include "../database/config.php";
include "../controllers/check_login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php get_headBlade_mobile(); ?>
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
                        <h4 class="page-title">Request Services</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active">Services</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="services_user_action_mobile.php">
                                <div class="form-group">
                                    <label class="col-md-12">Service Request Subject</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Service Request Subject" name="request_subject" class="form-control form-control-line" maxlength="100" minlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Service Request Description</label>
                                    <div class="col-md-12">                                        
                                        <textarea placeholder="Service Request Description" class="form-control form-control-line" name="request_description" maxlength="300" minlength="25" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Submit Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                              
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
  <?php 
    get_JSBlade_mobile();
  ?>
</body>

</html>
