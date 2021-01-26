<?php
session_start();
if(isset($_SESSION['veri']) == 0)
{
    header('location:emp_home.php');
}
// if(isset($_SESSION['veri']) == 2){
//     header('location:sub_admin_home.php');
// }
?>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Booking System</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/libs/jquery/jquery.min.js"></script>


    </head>

    <body data-sidebar="dark">
        <div class="spinner-border text-primary mr-2 mt-2" role="status">
                                                <span class="sr-only">Loading...</span>
         </div>
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <div class="navbar-brand-box">
                            <a href="admin_home.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/sg.png" alt="" height="22" style="width: 10px; padding: 10px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/sg.png" alt="" height="20" style="width: 100px; height: 100px; padding-top: 10px; ">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>
                    </div>
                     <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             
                                <span class="d-none d-sm-inline-block ml-1"><?=$_SESSION['name']?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              
                                <!-- <a class="dropdown-item" href="admin_home.php?p=<?=('edit_profile')?>"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>-->
                                <a class="dropdown-item" href="admin_home.php?p=<?=('admin_changepass')?>"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Change password</a> 
                                <a class="dropdown-item" href="control.php?action=logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>

          
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Offline Menu</li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi dripicons-view-list"></i>
                                    <span>Category Manage</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="admin_home.php?p=<?=('admin_add_category')?>">Add Category</a></li>
                                    <li><a href="admin_home.php?p=<?=('admin_category_info')?>">Category Booking</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi dripicons-view-list"></i>
                                    <span>Manage</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="admin_home.php?p=<?=('admin_booking_hall')?>">Manage Order</a></li>
                                    <li><a href="admin_home.php?p=<?=('admin_report')?>">Report</a></li>
                                    <!-- <li><a href="admin_home.php?p=<?=('admin_check_problem')?>">Check Problem</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi dripicons-view-list"></i>
                                    <span>Manage Employee</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="admin_home.php?p=<?=('admin_employee')?>">Employee</a></li>
                                    <li><a href="admin_home.php?p=<?=('admin_sub_employee')?>">Sub admin</a></li>
                                </ul>
                            </li>


                            <li class="menu-title">Online Menu</li>


<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi dripicons-view-list"></i>
        <span>Category Manage</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="admin_home.php?p=<?=('online/admin_add_category')?>">Add Category</a></li>
        <li><a href="admin_home.php?p=<?=('online/admin_category_info')?>">Category Booking</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi dripicons-view-list"></i>
        <span>Manage</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="admin_home.php?p=<?=('online/admin_booking_hall')?>">Manage Order</a></li>
        <li><a href="admin_home.php?p=<?=('online/admin_report')?>">Report</a></li>
       
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi dripicons-view-list"></i>
        <span>Link</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
    <li><a href="admin_home.php?p=<?=('admin_check_problem')?>">Check Problem</a></li>
<li><a href="admin_home.php?p=<?=('admin_nontice')?>">Important Notice</a></li>
       
    </ul>
</li>


             </ul>
                            
                    </div>
                </div>
            </div>
                 <?php
                    
                    if (isset($_GET['p']) && file_exists($_GET['p'].'.php')) {
                        include_once($_GET['p'].'.php');
                    }   
                 
                ?>
                        

        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>

         <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
       

       <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="assets/js/app.js"></script> 



    </body>
</html>
