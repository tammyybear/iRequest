<?php
include "controllers/include_partial_functions.php";
include "controllers/inventory_functions.php";
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
                        <h4 class="page-title">Automobiles</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active">Automobiles</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="add_automobiles_action.php">
                                <div class="form-group">
                                    <label class="col-md-12">Automobile Model Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Automobile Model Name" name="automobile_name" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Automobile Plate No.</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Automobile Plate No." class="form-control form-control-line" name="automobile_plate" required> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Add Automobile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Automobile Model Name</th>
                                            <th>Automobile Plate No.</th>                                            
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php getAutomobileData($conn); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- /.row -->
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
