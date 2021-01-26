<!doctype html> <html lang="en"> <head>
        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-primary bg-pattern">
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row" style="margin-top: -4%;">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h2 class="font-size-30 text-white-50 mb-4">Booking System</h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Register Account to Booking.</h5>
                                   <form class="form-horizontal" action="../control.php" id="login" method="post">
                                            <input type="hidden" value="register" name="action"/>   
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="role">Position</label>
                                                    <input type="text" class="form-control" id="role_name" required="" placeholder="Enter Position" name="role_name">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username"   required="" placeholder="Enter username" name="username">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="userpassword">Password</label>
                                                    <input type="text" class="form-control" id="password" required="" placeholder="Enter password" name="password">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="usernumber">Phone Number</label>
                                                    <input type="number" class="form-control" id="number" maxlength="10" minlength="10" placeholder="Enter Phone number" name="number">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="useremail">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit" value="submit" name="submit">Login</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="../index.php" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
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
        <script src="../assets/js/libs/jquery/jquery.min.js"></script>
        <script src="../assets/js/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
