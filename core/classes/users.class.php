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
			// $_SESSION['login'] = true;
			// $_SESSION['id'] = $user_data['id'];
			return true;
		}
		else
		{
			return false;
		}
	}

	
}

?>