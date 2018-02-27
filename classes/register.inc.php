<?php

class register extends db_connect_clss
{
	private $name, $lastname, $E_mail, $psswrd;

	//constructor 
	public function __construct($firstname, $surname, $email, $password)
	{
		$this->name = $firstname;
		$this->lastname = $surname;
		$this->E_mail = $email;
		$this->psswrd = $password;
	}

	//register method
	public function register()
	{
		$sql = "INSERT INTO `registered users` (`ID`, `Firstname`, `Lastname`, `Email`, `Password`) VALUES (NULL, '$this->name', '$this->lastname', '$this->E_mail', '$this->psswrd')";

		$sql_run = $this->db_connect()->query($sql);

		if(!$sql_run)
		{
			echo "query did not run";
		}
		else
		{
			include"homepage.php";
		}
	}
	public function check_users()
	{
		$sql = "SELECT * FROM `registered users` WHERE `Email` = '$this->E_mail'";
		$sql_run = $this->db_connect()->query($sql);

		 $rows = $sql_run->fetch_assoc();
		 $email = $rows["Email"];
		 
		 if($email == $this->E_mail)
		 {
		 	include "homepage3.php";
		 }
	}
	public function login()
	{
		$sql = "SELECT * FROM `registered users` WHERE `Password` = '$this->psswrd' AND `Email` = '$this->E_mail'";

		$sql_run = $this->db_connect()->query($sql);

		if($sql_run->num_rows == 0)
		{
			echo "please register for an account before attempting to login";
		}
		else
		{
			include "welcome.php";
		}
	}
	public function get_name(){
		$sql = "SELECT * FROM `registered users` WHERE `Email` = '$this->E_mail'";

		$sql_run = $this->db_connect()->query($sql);

		while($rows = $sql_run->fetch_assoc())
		{
			echo $rows["Firstname"]." ".$rows["Lastname"];
		}
	}
	public function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}

?>