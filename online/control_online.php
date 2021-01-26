<?php
session_start();
$action = $_REQUEST['action'];

include_once '../query.php';

switch($action){
    case'report_view_employee':
        report_view_employee();
    break;
    case'view_report':
        view_report();
    break;
    case'update_sub_report':
        update_sub_report();
    break;
    case'report_view_employee_check':
        report_view_employee_check();
    break;
    case'update_sub_report_confirm':
        update_sub_report_confirm();
    break;
    case'report_view_employee_report':
        report_view_employee_report();
    break;
    case'update_report_confirm':
        update_report_confirm();
    break;
    case 'category_online':
        category_online();
    break;
    case 'category_view':
        category_view();
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
    case'dashbord_view_category':
        dashbord_view_category();
    break;
    case'dashbord_view':
        dashbord_view();
    break;
}

function dashbord_view(){
    $f = new database();
    $rr = $f->view('report_online');
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
    $rr = $f->view('booking_info_online b, category_online c','b.*,c.id_category ,c.category',"b.category_id  = c.id_category");
    while($m = mysqli_fetch_array($rr)){
        $data['category'] = $m['category'];
        $data['booking_info'] = $m['booking_info'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}



function category_online(){
    $f = new database();
    extract($_POST);
    $aa= array('category'=>$category);
    if($category_id == 0)
    {
    $status = $f->insert('category_online',$aa);	
    }
    else{
    $status = $f->update('category_online',$aa,"id_category='".$category_id."'");	
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

function cansel_sub_report(){
    $f = new database();
    extract($_POST);
    $aa= array('employee_id'=>$employee_id,'category'=>$category,'booking'=>$booking,'booking_info'=>$booking_info,'start_time'=>$start_time,'end_time'=>$end_time,'status'=>$status,'status_it'=>$status_it,'report'=>$report);
    if($employee_id > 0)
    {
    $status = $f->insert('report_online',$aa);	
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
    $aa= array('employee_id'=>$employee_id,'category'=>$category,'booking'=>$booking,'booking_info'=>$booking_info,'start_time'=>$start_time,'end_time'=>$end_time,'status'=>'Confirm','status_it'=>'Confirm','report'=>'');
    if($employee_id > 0)
    {
    $status = $f->insert('report_online',$aa);	
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


function update_sub_report_confirm(){
    $f = new database();
    extract($_POST);
    $aa= array('status_it'=>'Confirm');
    $status = $f->update('booking_hall_online',$aa,"booking_add_id='".$booking_add_id."'");	
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
function update_report_confirm(){
    $f = new database();
    extract($_POST);
    $aa= array('status'=>'Confirm');
    $status = $f->update('booking_hall_online',$aa,"booking_add_id='".$booking_add_id."'");	
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
    $aa= array('employee_id'=>$id,'category'=>$category,'booking'=>$book,'booking_info'=>$booking,'start_time'=>$datetime_start,'end_time'=>$datetime_end,'status'=>'pending','status_it'=>'pending');
    if($booking_add_id == 0)
    {
    $status = $f->insert('booking_hall_online',$aa);	
    }
    else{
    $status = $f->update('booking_hall_online',$aa,"booking_add_id='".$booking_add_id."'");	
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


function booking(){
    $f = new database();
    extract($_POST);
    $aa= array('category_id'=>$id_category,'booking_info'=>$bookingname,'status'=> $status);
    if($booking_id == 0)
    {
    $status = $f->insert('booking_info_online',$aa);	
    }
    else{
    $status = $f->update('booking_info_online',$aa,"booking_info_id='".$booking_id."'");	
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
    $rr = $f->view('category_online');
    while($m = mysqli_fetch_array($rr)){
        $data['id_category'] = $m['id_category'];
        $data['category'] = $m['category'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function booking_view_employee(){
    $f = new database();
    $rr = $f->view('booking_hall_online b,login k','b.*,k.id_login,k.username',"k.id_login=b.employee_id");
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
        $data['status_it'] = $m['status_it'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function report_view_employee(){
    $f = new database();
    $rr = $f->view('report_online b,login l','b.*,l.id_login,l.username',"l.id_login =  b.employee_id");
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
        $data['status_it'] = $m['status_it'];
        $data['report'] = $m['report'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function report_view_employee_check(){
    $f = new database();
    $rr = $f->view('report_online');
    while($m = mysqli_fetch_array($rr)){
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $data['status_it'] = $m['status_it'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}

function booking_view(){
    $f = new database();
    $rr = $f->view('booking_info_online b,category_online c','b.*,c.id_category,c.category',"b.category_id=c.id_category");
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
    $rr = $f->view('booking_info_online','*',"category_id ='". $r."' ");
    while($m = mysqli_fetch_array($rr)){
        $data['booking_info_id'] = $m['booking_info_id'];
        $data['booking_info'] = $m['booking_info'];
        $data['status'] = $m['status'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function report_view_employee_report(){
    $f = new database();
    $r = $_POST['countt'];
    $rr = $f->view('report_online','report',"report_id='".$r."'");
    while($m = mysqli_fetch_array($rr)){
        $data['report'] = $m['report'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}


function view_report(){
    $f = new database();
    $r = $_POST['id'];
    $rr = $f->viewjoin($r);
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
        $data['status_it'] = $m['status_it'];
        $data['report'] = $m['report'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}
function booking_view_confirm_employee(){
    $f = new database();
    $r = $_POST['countt'];
    $rr = $f->view('booking_hall_online','*',"booking_add_id ='". $r."' ");
    while($m = mysqli_fetch_array($rr)){
        $data['booking_add_id'] = $m['booking_add_id'];
        $data['employee_id'] = $m['employee_id'];
        $data['category'] = $m['category'];
        $data['booking'] = $m['booking'];
        $data['booking_info'] = $m['booking_info'];
        $data['start_time'] = $m['start_time'];
        $data['end_time'] = $m['end_time'];
        $data['status'] = $m['status'];
        $data['status_it'] = $m['status_it'];
        $c[] = $data;
    }
    echo json_encode(array("status" => true, "rows" => $c));
}
?>