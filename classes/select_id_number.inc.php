<?php

class select_id extends db_connect_clss
{
	private $ID_number, $email_of_user;

	public function __construct($ID_number, $user_email)
	{
		$this->ID_number = $ID_number;
		$this->email_of_user = $user_email;
	}

	public function select_id()
	{
		$sql = "SELECT * FROM `add client` WHERE `ID number` = '$this->ID_number' AND `email_of_user` = '$this->email_of_user'";

		$sql_run = $this->db_connect()->query($sql);

		if($sql_run->num_rows == 0)
		{
			die("first add the client on clients list");
		}
	}
}

?>