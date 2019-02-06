<?php 


class DbConnection 
{
	public $conn;

	public function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","juanapply");
		if (mysqli_connect_errno()) {
			echo "Error: DB";
		}
	}
}

$dbconn = new DbConnection;

?>