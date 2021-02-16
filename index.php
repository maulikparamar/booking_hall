<!doctype html>
<?php
session_start();
if(isset($_SESSION['name']))
{
    header('location:emp_home.php');
}
?>
 <html lang="en"> <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="assets/employee.js"></script>
</head>
    <body class="bg-primary bg-pattern">
        <div class="account-pages my-5 pt-5">
            <div class="container" class="img">
                <div class="row" style="margin-top: -4%;">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                           <!--  <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="24" alt="logo"></a> -->
                            <h2 class="font-size-30 text-white-50 mb-4">Booking System</h2>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Login Account to Booking.</h5>
                                    <form class="form-horizontal" id="login" value="login">
										<input type="hidden" name="action" value="login">
                                        <div class="row">
                                            <div class="col-md-12">
											 <div class="form-group mb-4">
                                                    <label for="employee/role">Select Your employee/admin</label>
                                                    <select class="form-control" id="select_ed"placeholder="Enter SELECT " name="select_ed">
														<option id="ed" value="0">Employee</option>
														<option id="ad" value="1">Admin</option>
                                                        <option id="sad" value="2">Sub Admin</option>
													</select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" placeholder="Enter Email/Mobile No" name="username">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="userpassword">
                                                </div>
                                                
                                                <div class="mt-4">
                                                    <input class="btn btn-success btn-block waves-effect waves-light" onclick="login()" type="button" value="submit"></input>
                                                
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <!-- <a href="auth-login.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> </a> -->
                                                    <a href="startup/index.php" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Register</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/js/pages/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>
        


    </body>
</html>
