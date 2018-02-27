<?php

class db_connect_clss
{
	private $severname, $username, $password, $db_name;

	public function db_connect()
	{
		$this->severname = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->db_name = "Mzwethini tradings";

		$conn = new mysqli($this->severname, $this->username, $this->password, $this->db_name);

		if(!$conn){
			echo "db access denide";
		}
		else{
			return $conn;
		}
	}
}

?>