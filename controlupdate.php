<?php
$action = $_REQUEST['action'];

include_once 'query.php';

switch ($action) {
    case 'category_update':
        category_update();
        break;
    case'booking_update':
        booking_update();
    break;
    case'sub_update':
        sub_update();
    break;
    default:
        # code...
        break;
}


function category_update(){
    $f= new database();
    extract($_POST);
    $r = $_POST['countt'];

        $t = $f->view('category','*',"id_category='".$r."'");

        if(mysqli_num_rows($t) > 0)
            {
            $c = mysqli_fetch_array($t);
            echo json_encode(array('status'=>true,'list'=>$c));
            }
            else{
            echo json_encode(array('status'=>flase));
            }	

}



function booking_update(){
    $f= new database();
    extract($_POST);
    $r = $_POST['countt'];

        $t = $f->view('booking_info','*',"booking_info_id='".$r."'");

        if(mysqli_num_rows($t) > 0)
            {
            $c = mysqli_fetch_array($t);
            echo json_encode(array('status'=>true,'list'=>$c));
            }
            else{
            echo json_encode(array('status'=>flase));
            }	

}


function sub_update()
{
    $f= new database();
    extract($_POST);
    $r = $_POST['countt'];

        $t = $f->view('booking_hall','*',"booking_add_id='".$r."'");

        if(mysqli_num_rows($t) > 0)
            {
            $c = mysqli_fetch_array($t);
            echo json_encode(array('status'=>true,'list'=>$c));
            }
            else{
            echo json_encode(array('status'=>flase));
            }	

}

?>