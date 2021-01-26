<?php
$action = $_REQUEST['action'];

include_once '../query.php';

switch ($action) {
    case 'category_delete':
        category_delete();
        break;
    case 'booking_delete':
		booking_delete();
	break;
	case'booking_sub_delete':
		booking_sub_delete();
	break;
	case'booking_sub_confirm_delete':
		booking_sub_confirm_delete();
	break;
	case'report_subadmin_cancel':
		report_subadmin_cancel();
	break;
	case'delete_sub_emp':
		delete_sub_emp();
	break;
    default:
        # code...
        break;
}


function category_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('category_online',"id_category ='".$countt."' " );

 	 if($d > 0)
		{
			$json = array('status'=>true,'message'=>'Data deleted succesfully');
		}
		else
		{
			$json = array('status'=>false,'message'=>'Error! Data could not be deleted!');

		}
		echo json_encode($json);
}

function booking_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('booking_info_online',"booking_info_id  ='".$countt."' " );

 	 if($d > 0)
		{
			$json = array('status'=>true,'message'=>'Data deleted succesfully');
		}
		else
		{
			$json = array('status'=>false,'message'=>'Error! Data could not be deleted!');

		}
		echo json_encode($json);
}


function booking_sub_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('booking_hall',"booking_add_id ='".$countt."' " );

 	 if($d > 0)
		{
			$json = array('status'=>true,'message'=>'Data deleted succesfully');
		}
		else
		{
			$json = array('status'=>false,'message'=>'Error! Data could not be deleted!');

		}
		echo json_encode($json);
}

function booking_sub_confirm_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('booking_hall_online',"booking_add_id ='".$countt."' " );

 	 if($d > 0)
		{
			$json = array('status'=>true,'message'=>'Data deleted succesfully');
		}
		else
		{
			$json = array('status'=>false,'message'=>'Error! Data could not be deleted!');

		}
		echo json_encode($json);
}

function report_subadmin_cancel(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('report_online',"report_id ='".$countt."' " );

 	 if($d > 0)
		{
			$json = array('status'=>true,'message'=>'Data deleted succesfully');
		}
		else
		{
			$json = array('status'=>false,'message'=>'Error! Data could not be deleted!');

		}
		echo json_encode($json);
}


?>