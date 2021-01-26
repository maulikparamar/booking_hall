<?php
session_start();
if(!isset($_SESSION['veri']) == 0 )
{
    header('location:emp_home.php');
}
?>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Hall Booking System</title>
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <link
      href="https://playground.anychart.com/docs/samples/GANTT_Timeline_Appearance/iframe"
      rel="canonical"
    />
    <meta
      content="Gantt Chart,Gantt Project Chart,Project Management"
      name="keywords"
    />
    <meta
      content="AnyChart - JavaScript Charts designed to be embedded and integrated"
      name="description"
    />
    <link
      href="https://cdn.anychart.com/releases/8.9.0/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4"
      rel="stylesheet"
      type="text/css"
    />
    <style>
      html,
      body,
      #kcontainer {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

    <link href="./css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    </head>

    <body data-sidebar="dark">
        <div class="spinner-border text-primary mr-2 mt-2" role="status">
                                                <span class="sr-only">Loading...</span>
         </div>
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header" >
                    <div class="d-flex" >
               
                           <a href="emp_home.php?p=emp_home_choice"><h3 style="margin:25px 20px">Hall Booking System</h3></a>
    
                    </div>
                    <div class="navbar navbar-expand-lg navbar-light bg-white" style="width:30%;">
        <ul class="navbar-nav">
        <li class="nav-item active"> <a class="navbar-brand" href="emp_home.php?p=<?=('emp_home_choice')?>">Home </a> </li>
        <li class="nav-item dropdown">
			<a class="navbar-brand dropdown-toggle" href="" data-toggle="dropdown">   Online/Offline  </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('online/emp_category')?>">  Online</a></li>
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('emp_category')?>"> Offline </a></li>
		    </ul>
		</li>
        <li class="nav-item dropdown">
			<a class="navbar-brand dropdown-toggle" href="" data-toggle="dropdown"> Book Hall List </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('online/emp_booking_hall')?>">  Online</a></li>
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('emp_booking_hall')?>"> Offline </a></li>
		    </ul>
		</li>
        <!-- <li class="nav-item active"> <a class="navbar-brand" href="emp_home.php?p=<?=('emp_booking_hall')?>">Book Hall List </a> </li> -->
        <li class="nav-item dropdown">
			<a class="navbar-brand dropdown-toggle" href="" data-toggle="dropdown"> Report </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('online/emp_report')?>">  Online</a></li>
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('emp_report')?>"> Offline </a></li>
		    </ul>
		</li>
       
        <!-- <li class="nav-item active"> <a class="navbar-brand" href="emp_home.php?p=<?=('emp_report')?>">Report </a> </li> -->
        <li class="nav-item active"> <a class="navbar-brand" href="emp_home.php?p=<?=('emp_issues')?>">Issues </a> </li>
        <li class="nav-item dropdown">
			<a class="navbar-brand dropdown-toggle" href="" data-toggle="dropdown"> DashBoard </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('online/dashbord')?>">DB  Online</a></li>
			  <li><a class="dropdown-item" href="emp_home.php?p=<?=('dashbord')?>"> DB Offline </a></li>
		    </ul>
		</li>
    </ul>
</div>
                     <div class="dropdown d-inline-block">
        
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          
                                <span class="d-none d-sm-inline-block ml-1"><?=$_SESSION['name']?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                  
                                <a class="dropdown-item" href="emp_home.php?p=<?=('emp_profile')?>"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
        
                                <a class="dropdown-item" href="emp_home.php?p=<?=('emp_changepass')?>"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Change password</a>
                         
                                <a class="dropdown-item" href="control.php?action=logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>

          
                </div>
            </header>
                    

                       <?php
                    
                    if (isset($_GET['p']) && file_exists($_GET['p'].'.php')) {
                        include_once($_GET['p'].'.php');
                    }   
                 
                ?>
                        

            <!-- ============================================================== -->
            
            <!-- end main content-->

      
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="assets/js/app.js"></script> 


    </body>
</html>
