<?php

/**
 * 
 */
// include '../database/connection.php';

class Users extends DbConnection
{
	
	// function __construct(argument)
	// {
		
	// }
	public function loginuser($email,$pwd){

		// $pass = md5($pass);
		$sql = "SELECT * from users WHERE email='$email'  and password='$pwd'";
		$result = mysqli_query($this->conn,$sql);
		$user_data = mysqli_fetch_array($result);
		$countrow = $result->num_rows;
		// echo $sql;
		if ($countrow == 1) {
			//this login var is for session
			$_SESSION['login'] = true;
			$_SESSION['id'] = $user_data['id_users'];
			$_SESSION['usertype'] = $user_data['user_type'];
			return true;
		}
		else
		{
			return false;
		}
	}
	public function register_user($firstname,$lastname,$contact,$emailreg,$pwdreg,$usertype)
	{
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE email='$emailreg'";
		$check = $this->conn->query($sql);
		$countrow = $check->num_rows;	
		echo $sql;
		//insert if no result from db
		if ($countrow == 0) {
			// $sql1="INSERT INTO users SET firstname='$firstname', lastname='$lastname', contact_num ='$contact', email='$emailreg', password='$pwdreg', user_type='$usertype'";
			$result = "inserted";
			// $result= mysqli_query($this->conn,$sql1) or die(mysqli_connect_errno()."Data cannot insert inside table");
			// echo $sql1;
			return $result;
		}
		else{ return false; }
	}
	//session start
	public function getsession(){
		return $_SESSION['login'];

	}
	public function getsessionid(){
		return $_SESSION['id'];

	}
	//LOGOUT DESTROY SESSION
	public function user_logout()
	{
		$_SESSION['login'] = FALSE;
		session_destroy();
	}

	public function savedata($table,$fields)
	{
		$sql ="";
		$sql .="INSERT INTO ".$table;
		$sql .=" (".implode(",",array_keys($fields)).") VALUES ";
		$sql .="('".implode("','",array_values($fields))."')";
		// print_r($fields);
		// echo $sql;
		// print_r($fields);
		$query =mysqli_query($this->conn,$sql);
		echo $sql;
		if ($query) {
			return true;
		}
	}
	public function fetchdata($table){

			$sql = " SELECT * FROM ".$table;
			$array = array();
			// echo $sql;
			$query =mysqli_query($this->conn,$sql);

			// $countrow = $query->num_rows;
			
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] =$row;
			}
			return $array;

	}
	public function updatedata($table,$where,$fields){
	$sql ="";
	$condition="";
	foreach ($where as $key => $value) {
		$condition .= $key. "='".$value."' AND";
	}
	$condition =substr($condition,0,-5);
	foreach ($fields as $key => $value) {
		//UPDATE FUNCTION QUERY
		//UPDATE table SET lastname='', firstname=''...
		$sql .= $key . "='".$value."',";

	}
	$sql = substr($sql,0,-2);value."' AND ";
	$sql = " UPDATE ".$table." SET ".$sql. "' WHERE ".$condition."'";
echo $sql;
	if (mysqli_query($this->conn,$sql)) {
		return true;
	}
	
	
	}	

	
}

?>