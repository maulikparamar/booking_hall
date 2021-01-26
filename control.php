<?php
session_start();
$action = $_REQUEST['action'];

include_once 'query.php';

switch($action){
    case 'register':
        register();
        break;
    case'profile':
        profile();
    break;
    case'sub_changepassword':
        sub_changepassword();
    break;
    case'changepassword':
        changepassword();
    break;
    case'admin_changepassword':
        admin_changepassword();
    break;
    case'login':
        login();
    break;
    case'issues_view':
        issues_view();
    break;
    case'issues_insert':
        issues_insert();
    break;
    case'activeInactive':
        activeInactive();
    break;
    case'report_view_employee_report':
        report_view_employee_report();
    break;
    case'report_view_employee':
        report_view_employee();
    break;
    case 'category':
        category();
    break;
    case'report_view_employee_check':
        report_view_employee_check();
    break;
    case'msg_view':
        msg_view();
    break;
    case'msg_insert':
        msg_insert();
    break;
    case'view_report':
        view_report();
    break;
    case 'category_view':
        category_view();
    break;
    case'activeInactive_sub':
        activeInactive_sub();
    break;
    case'activeInactiveupdate_sub':
        activeInactiveupdate_sub();
    break;
    case'dashbord_view_category':
        dashbord_view_category();
    break;
    case'dashbord_view':
        dashbord_view();
    break;
    case'booking_view_confirm_employee':
        booking_view_confirm_employee();
    break;
    case'cansel_sub_report':
        cansel_sub_report();
    break;
    case'admin_sub_emp':
        admin_sub_emp();
    break;
    case'booking':
        booking();
    break;
    case'booking_view':
        booking_view();
    break;
    case'insert_sub_report':
        insert_sub_report();
    break;
    case'category_view_product':
        category_view_product();
    break;
    case'booking_hall':
        booking_hall();
    break;
    case'booking_view_employee':
        booking_view_employee();
    break;
    case'admin_emp':
        admin_emp();
    break;
    case'activeInactiveupdate':
        activeInactiveupdate();
    break;
    case 'logout';
    session_destroy();
header('location:index.php');
    break;
}


function register(){
    $f = new database();
    extract($_POST);
    $status = array('role'=>$role_name);
    $status_add = $f->insert('role',$status);

    $log = array('role_id'=>$status_add,'username'=>$username,'password'=>$password,'number'=>$number,'email'=>$email,'status_log'=>$id = '0');
    
    $add = $f->insert('login',$log);
    
    if($add > 0){
        $_SESSION['name'] = $username;
        header('location:emp_home.php?p=emp_home_choice');
    }
    else{
        alert('All ready add');
    }
}


function login(){
    $r = new database();
	extract($_REQUEST);
	if($select_ed == 0){
	$t = $r->view('login','id_login',"username = '".$username."'");
	if(mysqli_num_rows($t) > 0)
	{
		$j = $r->view('login','id_login',"username = '".$username."' and password = '".$userpassword."'");
		if(mysqli_num_rows($j) > 0)
		{
			$i = $r->view('login','id_login,username',"username = '".$username."' and password = '".$userpassword."' and status_log = '0'");
			if(mysqli_num_rows($i) > 0)
			{
				$k = mysqli_fetch_array($i);
				$_SESSION['name'] = $k['username'];
				$_SESSION['id'] = $k['id_login'];
				// header('location:homeemployee.php');
				$json = array('status'=>'1','message'=>'welcome');
			}
			else{
				$json = array('status'=>'0','message'=>'you r blocked!!');
			}
		}
		else{
			$json = array('status'=>'0','message'=>'you r wrong password!!!!');
		}
	}
	else{
		 $json = array('status'=>'0','message'=>'you r wrong unsername!!');
	}
	echo json_encode($json);
	}
	else if($select_ed == 1){
		$t = $r->view('admin','id_admin',"admin = '".$username."'");
	if(mysqli_num_rows($t) > 0)
	{
		$j = $r->view('admin','id_admin',"admin = '".$username."' and password = '".$userpassword."'");
		if(mysqli_num_rows($j) > 0)
		{
			$i = $r->view('admin','id_admin,admin,admin_veri',"admin = '".$username."' and password = '".$userpassword."' and admin_status = '1'");
			if(mysqli_num_rows($i) > 0)
			{
				$k = mysqli_fetch_array($i);
				$_SESSION['name'] = $k['admin'];
                $_SESSION['id'] = $k['id_admin'];
                $_SESSION['veri'] = $k['admin_veri'];
				//header('location:home.php');
				$json = array('status'=>'2','message'=>'welcome');
			}
			else{
				$json = array('status'=>'0','message'=>'you r blocked!!');
			}
		}
		else{
			$json = array('status'=>'0','message'=>'you r wrong password!!!!');
		}
	}
	else{
		 $json = array('status'=>'0','message'=>'you r wrong unsername!!');
	}
	echo json_encode($json);
    }
    else if($select_ed == 2){
		$t = $r->view('sub_admin','id_admin',"admin_username = '".$username."'");
	if(mysqli_num_rows($t) > 0)
	{
		$j = $r->view('sub_admin','id_admin',"admin_username = '".$username."' and admin_password = '".$userpassword."'");
		if(mysqli_num_rows($j) > 0)
		{
			$i = $r->view('sub_admin','id_admin,admin_username,verify',"admin_username = '".$username."' and admin_password = '".$userpassword."' and admin_status = '2'");
			if(mysqli_num_rows($i) > 0)
			{
				$k = mysqli_fetch_array($i);
				$_SESSION['name'] = $k['admin_username'];
                $_SESSION['id'] = $k['id_admin'];
                $_SESSION['veri'] = $k['verify'];
				//header('location:sub_admin_home.php');
				$json = array('status'=>'3','message'=>'welcome');
			}
			else{
				$json = array('status'=>'0','message'=>'you r blocked!!');
			}
		}
		else{
			$json = array('status'=>'0','message'=>'you r wrong password!!!!');
		}
	}
	else{
		 $json = array('status'=>'0','message'=>'you r wrong unsername!!');
	}
	echo json_encode($json);
	}
}



function category(){
    $f = new database();
    extract($_POST);
    $aa= array('category'=>$category);
    if($category_id == 0)
    {
    $status = $f->insert('category',$aa);	
    }
    else{
    $status = $f->update('category',$aa,"id_category='".$category_id."'");	
    }
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function msg_insert(){
    $f = new database();
    extract($_POST);
    $aa= array('msg'=>$msg);
    $status = $f->insert('msg',$aa);	
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function profile(){
    $f = new database();
    extract($_POST);
    $aa= array('username '=>$username,'number'=>$number,'email'=>$email);
    $status = $f->update('login',$aa,"id_login ='".$_SESSION['id']."'");	
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function changepassword()
{
    $f = new database();
        extract($_POST);
        if ($newpassword == $newpassword1) {
            
        
        $aa = array('password'=>$newpassword);
        $t = $f->view('login','id_login ',"id_login  = '".$_SESSION['id']."' and password = '".$emp_password."'");
    
        if (mysqli_num_rows($t)>0) {
            
                    $j = $f->update('login',$aa,"id_login ='".$_SESSION['id']."'");
                    if($j>0)
                    {
                        $json = array('status'=>'1','message'=>'succesfully changepassword');
                    }	
                    else{
                        $json = array('status'=>'0','message'=>'some problems');
                    }
            
        }
        else{
            $json = array('status'=>'0','message'=>'wrong old password');
             }
    }
    else{
    $json = array('status'=>'0','message'=>'not match password');
        }			
    echo json_encode($json);	
}


function sub_changepassword()
{
    $f = new database();
    extract($_POST);
    if ($newpassword == $newpassword1) {
    $aa = array('admin_password'=>$newpassword);

    $t = $f->view('sub_admin','id_admin',"id_admin='".$_SESSION['id']."' and admin_password='".$emp_password."'");

    if (mysqli_num_rows($t)>0) {
        
                $j = $f->update('sub_admin',$aa,"id_admin='".$_SESSION['id']."'");
                if($j>0)
                {
                    $json = array('status'=>'1','message'=>'succesfully changepassword');
                }	
                else{
                    $json = array('status'=>'0','message'=>'some problems');
                }
        
    }
    else{
        $json = array('status'=>'0','message'=>'wrong old password');
         }
}
else{
$json = array('status'=>'0','message'=>'not match password');
    }			
echo json_encode($json);
}


function admin_changepassword()
{
    $f = new database();
    extract($_POST);
    if ($newpassword == $newpassword1) {
    $aa = array('password'=>$newpassword);

    $t = $f->view('admin','id_admin',"id_admin='".$_SESSION['id']."' and password='".$emp_password."'");

    if (mysqli_num_rows($t)>0) {
        
                $j = $f->update('admin',$aa,"id_admin='".$_SESSION['id']."'");
                if($j>0)
                {
                    $json = array('status'=>'1','message'=>'succesfully changepassword');
                }	
                else{
                    $json = array('status'=>'0','message'=>'some problems');
                }
        
    }
    else{
        $json = array('status'=>'0','message'=>'wrong old password');
         }
}
else{
$json = array('status'=>'0','message'=>'not match password');
    }			
echo json_encode($json);
}

function issues_insert(){
    $f = new database();
    extract($_POST);
    
    $aa= array('employee'=>$id,'feedback'=>$feedback);
    $status = $f->insert('feedback',$aa);	
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function cansel_sub_report(){
    $f = new database();
    extract($_POST);
    $aa= array('employee_id'=>$employee_id,'category'=>$category,'booking'=>$booking,'booking_info'=>$booking_info,'start_time'=>$start_time,'end_time'=>$end_time,'status'=>'Cancel','report'=>$report);
    if($employee_id > 0)
    {
    $status = $f->insert('report',$aa);	
    }
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function insert_sub_report(){
    $f = new database();
    extract($_POST);
    $aa= array('employee_id'=>$employee_id,'category'=>$category,'booking'=>$booking,'booking_info'=>$booking_info,'start_time'=>$start_time,'end_time'=>$end_time,'status'=>'Confirm','report'=>'');
    if($employee_id > 0)
    {
    $status = $f->insert('report',$aa);	
    }
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}


function booking_hall(){
    $f = new database();
    extract($_POST);
    $aa= array('employee_id'=>$id,'category'=>$category,'booking'=>$book,'booking_info'=>$booking,'start_time'=>$datetime_start,'end_time'=>$datetime_end,'status'=>'pending');
    if($booking_add_id == 0)
    {
    $status = $f->insert('booking_hall',$aa);	
    }
    else{
    $status = $f->update('booking_hall',$aa,"booking_add_id='".$booking_add_id."'");	
    }
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}


function activeInactiveupdate(){
    $f = new database();
    extract($_POST);
    $status_log = $_POST['status'];
    $id_login = $_POST['id'];
    if($status_log == 0)
    $aa= array('status_log'=>'1');
    else{
        $aa= array('status_log'=>'0');
    }
    $status = $f->update('login',$aa,"id_login='".$id_login."'");	
    if($status > 0)
    {
      $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
        $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function activeInactiveupdate_sub(){
    $f = new database();
    extract($_POST);
    $status_log = $_POST['status'];
    $id_login = $_POST['id'];
    if($status_log == 2)
    $aa= array('admin_status'=>'1');
    else{
        $aa= array('admin_status'=>'2');
    }
    $status = $f->update('sub_admin',$aa,"id_admin='".$id_login."'");	
    if($status > 0)
    {
      $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
        $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}


function booking(){
    $f = new database();
    extract($_POST);
    $aa= array('category_id'=>$id_category,'booking_info'=>$bookingname,'status'=> $status);
    if($booking_id == 0)
    {
    $status = $f->insert('booking_info',$aa);	
    }
    else{
    $status = $f->update('booking_info',$aa,"booking_info_id='".$booking_id."'");	
    }
    if($status > 0)
    {
        $json = array('status'=>true,'message'=>'Data saved succesfully');
    }
    else
    {
         $json = array('status'=>false,'message'=>'Error! Data could not be saved!');
    }
    echo json_encode($json);
}

function category_view(){
    $f = new database();
    $rr = $f->view('category');
    while($m = mysqli_fetch_array($rr)){
        $data['id_category'] = $m['id_category'];
        $data['category'] = $m['category'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function admin_emp(){
    $f = new database();
    $rr = $f->view('login l , role r','l.*,r.id_role,r.role',"l.role_id = r.id_role");
    while($m = mysqli_fetch_array($rr)){
        $data['id_login'] = $m['id_login'];
        $data['role'] = $m['role'];
        $data['username'] = $m['username'];
        $data['password'] = $m['password'];
        $data['number'] = $m['number'];
        $data['email'] = $m['email'];
        $data['status_log'] = $m['status_log'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function dashbord_view(){
    $f = new database();
    $rr = $f->view('report');
    while($m = mysqli_fetch_array($rr)){
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['booking_info'] = $m['booking_info'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function dashbord_view_category(){
    $f = new database();
    $rr = $f->view('booking_info b, category c','b.*,c.id_category ,c.category',"b.category_id  = c.id_category");
    while($m = mysqli_fetch_array($rr)){
        $data['category'] = $m['category'];
        $data['booking_info'] = $m['booking_info'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function issues_view(){
    $f = new database();
    $rr = $f->view('feedback l , login r','l.*,r.id_login,r.username',"l.employee = r.id_login");
    while($m = mysqli_fetch_array($rr)){
        $data['id_feedback'] = $m['id_feedback'];
        $data['username'] = $m['username'];
        $data['feedback'] = $m['feedback'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function view_report(){
    $f = new database();
    $r = $_POST['id'];
    $rr = $f->viewjoin_report($r);
    while($m = mysqli_fetch_array($rr)){
        $data['report_id'] = $m['report_id'];
        $data['id_login'] = $m['id_login'];
        $data['username'] = $m['username'];
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['booking_info'] = $m['booking_info'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $data['report'] = $m['report'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function msg_view(){
    $f = new database();
    $rr = $f->view('msg');
    while($m = mysqli_fetch_array($rr)){
        $data['id_msg'] = $m['id_msg'];
        $data['msg'] = $m['msg'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}



function activeInactive(){
    $f = new database();
    $r = $_POST['id'];
    $rr = $f->view('login l','l.id_login,l.status_log',"id_login = '".$r."'");
    while($m = mysqli_fetch_array($rr)){
        $data['id_login'] = $m['id_login'];
        $data['status_log'] = $m['status_log'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function activeInactive_sub(){
    $f = new database();
    $r = $_POST['id'];
    $rr = $f->view('sub_admin l','l.id_admin,l.admin_status',"id_admin = '".$r."'");
    while($m = mysqli_fetch_array($rr)){
        $data['id_admin'] = $m['id_admin'];
        $data['admin_status'] = $m['admin_status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function booking_view_employee(){
    $f = new database();
    $rr = $f->view('booking_hall b,login k','b.*,k.id_login,k.username',"k.id_login=b.employee_id");
    while($m = mysqli_fetch_array($rr)){
        $data['booking_add_id'] = $m['booking_add_id'];
        $data['id_login'] = $m['id_login'];
        $data['username'] = $m['username'];
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['booking_info'] = $m['booking_info'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function admin_sub_emp(){
    $f = new database();
    $rr = $f->view('sub_admin');
    while($m = mysqli_fetch_array($rr)){
        $data['id_admin'] = $m['id_admin'];
        $data['admin_username'] = $m['admin_username'];
        $data['admin_password'] = $m['admin_password'];
        $data['admin_status'] = $m['admin_status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function report_view_employee(){
    $f = new database();
    $rr = $f->view('report b,login l','b.*,l.id_login,l.username',"l.id_login =  b.employee_id");
    while($m = mysqli_fetch_array($rr)){
        $data['report_id'] = $m['report_id'];
        $data['id_login'] = $m['id_login'];
        $data['username'] = $m['username'];
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['booking_info'] = $m['booking_info'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $data['report'] = $m['report'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function report_view_employee_check(){
    $f = new database();
    $rr = $f->view('report');
    while($m = mysqli_fetch_array($rr)){
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function report_view_employee_report(){
    $f = new database();
    $r = $_POST['countt'];
    $rr = $f->view('report','report',"report_id='".$r."'");
    while($m = mysqli_fetch_array($rr)){
        $data['report'] = $m['report'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function booking_view(){
    $f = new database();
    $rr = $f->view('booking_info b,category c','b.*,c.id_category,c.category',"b.category_id=c.id_category");
    while($m = mysqli_fetch_array($rr)){
        $data['booking_info_id'] = $m['booking_info_id'];
        $data['category'] = $m['category'];
        $data['booking_info'] = $m['booking_info'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function category_view_product(){
    $f = new database();
    $r = $_POST['countt'];
    $rr = $f->view('booking_info','*',"category_id ='". $r."' ");
    while($m = mysqli_fetch_array($rr)){
        $data['booking_info_id'] = $m['booking_info_id'];
        $data['booking_info'] = $m['booking_info'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}
function booking_view_confirm_employee(){
    $f = new database();
    $r = $_POST['countt'];
    $rr = $f->view('booking_hall','*',"booking_add_id ='". $r."' ");
    while($m = mysqli_fetch_array($rr)){
        $data['booking_add_id'] = $m['booking_add_id'];
        $data['employee_id'] = $m['employee_id'];
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['booking_info'] = $m['booking_info'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}
?>