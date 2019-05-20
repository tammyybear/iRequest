<?php
include "controllers/include_partial_functions.php";
include "controllers/services_functions.php";
include "controllers/users_functions.php";
include "database/config.php";
include "controllers/check_login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php get_headBlade(); ?>
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
                        <b><img src="resources/images/logo.png"/></b>
                        <small class="hidden-xs"><b>request</b></small>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>                                  
                        <?php getHeaderUserName(); ?>
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
                        <h4 class="page-title">Services</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active">Services</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
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
                                        <input type="text" value="<?php echo getUserDetailsById($conn, GetTopRequestData($conn)[0])[0] ?>" class="form-control form-control-line" name="requestor_name">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Close Ticket</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="services_user.php">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Request Service</button>
                                    </div>
                                </div>
                            </form>                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ticket ID</th>
                                            <th>Request Subject</th>
                                            <th>Requestor Name</th>
                                            <th>Date Requested</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php  getServiceData ($conn)?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php get_FooterBlade(); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
  <?php 
    get_JSBlade();
  ?>
</body>

</html>
