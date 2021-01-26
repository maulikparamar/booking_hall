<?php
$action = $_REQUEST['action'];

include_once 'query.php';

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
	case'msg_delete':
		msg_delete();
	break;
	case'booking_sub_confirm_delete':
		booking_sub_confirm_delete();
	break;
	case'report_subadmin_cancel':
		report_subadmin_cancel();
	break;
	case'delete_emp':
		delete_emp();
	break;
	case'delete_sub_emp':
		delete_sub_emp();
	break;
	case'feedback_delete':
		feedback_delete();
	break;
    default:
        # code...
        break;
}


function category_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('category',"id_category ='".$countt."' " );

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

function msg_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('msg',"id_msg ='".$countt."' " );

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
 	 $d =$f->delete('booking_info',"booking_info_id  ='".$countt."' " );

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

function feedback_delete(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('feedback',"id_feedback ='".$countt."' " );

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

function report_subadmin_cancel(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('report',"report_id ='".$countt."' " );

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


function delete_emp(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('login',"id_login ='".$countt."' " );

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


function delete_sub_emp(){
    $f = new database();
    extract($_POST);
 	 $d =$f->delete('sub_admin',"id_admin ='".$countt."' " );

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