<?php
include_once 'connect.php';
class database{

	private $con;
	public function __construct()
	{
		$this->con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
	}

	public function view($table,$data='*',$where='',$other=''){
	
		if($where != '')
		{
			$where = 'where '.$where;
		}
		  $b = mysqli_query($this->con,"select $data from $table $where $other");
		//  echo "select $data from $table $where $other";
		//  mysqli_close($this->con);
		  return $b;

	}
	// select e.empname, d.depname, de.designation 
	// from Employee e  
	// inner join Department d on e.deptid = d.id 
	public function viewjoin($r){
	
		  $b = mysqli_query($this->con,"select r.*,l.id_login,l.username from report_online r inner join login l on l.id_login = r.employee_id where r.category LIKe '%".$r."%' or r.start_time LIKe '%".$r."%' or r.end_time LIKe '%".$r."%'");
		//  echo "select $data from $table $where $other";
		//  mysqli_close($this->con);
		  return $b;

	}
	public function viewjoin_report($r){
	
		$b = mysqli_query($this->con,"select r.*,l.id_login,l.username from report_online r inner join login l on l.id_login = r.employee_id where r.category LIKe '%".$r."%' or r.start_time LIKe '%".$r."%' or r.end_time LIKe '%".$r."%'");
	  //  echo "select $data from $table $where $other";
	  //  mysqli_close($this->con);
		return $b;

  }
	
/*	$x = mysqli_insert_id($con);
		  mysqli_close($this->con);*/

public	function delete($table,$where){
	
		  $b = mysqli_query($this->con,"delete from $table where $where");
		  mysqli_close($this->con);
		  return $b;


	}


public function update($table,$arg,$where){

			$ff = '';
			$t = 1;
		  foreach ($arg as $key => $value) {
		  		if($t == 1)
		  		{
		  			$ff = $key .'='."'".$value."'";
		  		}
		  		else{
		  			$ff = $ff.','.$key .'='."'".$value."'";
		  		}
		  		$t++;	
		  	}	

		  $b = mysqli_query($this->con,"update $table set $ff where $where");
		  mysqli_close($this->con);
		  return $b;
	}



	public function insert($table,$arg){

			$ff = '';
			$vv = '';
			$t = 1;
		  foreach ($arg as $key => $value) {
		  		if($t == 1)
		  		{
		  			$ff = $key;
		  			$vv = "'".$value."'";
		  		}
		  		else{
		  			$ff = $ff.','.$key;
		  			$vv = $vv.','."'".$value."'";
		  		}
		  		$t++;	
		  	}	

		  $b = mysqli_query($this->con,"insert into $table($ff) values($vv)");
		  $rr = mysqli_insert_id($this->con);
		 // mysqli_close($this->con);
		  
		  return $rr;
	}



}

?>