<?php
include "../controllers/include_partial_functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php get_headBlade_mobile(); ?>
<style>
		html{
			background: #EDF1F5;
		}
</style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper"  style = "background-color: #EDF1F5;">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Login Page</h4> </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="login_action.php">
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Username" name="username" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder="Password" class="form-control form-control-line" name="password" id="example-email" required> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="login">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php 
    get_JSBlade_mobile();
  ?>
</body>

</html>
