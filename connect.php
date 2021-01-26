<?php
include_once 'confing.php';
class connect{
    function dbcon(){
        $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
        return $con;
    }
}

?>