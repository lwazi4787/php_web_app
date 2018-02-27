<?php

//session_start();
class add_client extends db_connect_clss
{
	private $name_p, $surname_p, $gender_p, $ID_number_p, $date_of_birth, $session;

	private $sql_run, $num_of_pages;

	public $sql_run2;

		public function __construct($name, $surname, $gender, $ID_number, $date_of_birth, $user_email)
		{
			$this->name_p = $name;
			$this->surname_p = $surname;
			$this->gender_p = $gender;
			$this->ID_number_p = $ID_number;
			$this->date_of_birth = $date_of_birth;
			$this->session = $user_email;
		}

	public function add_client(){
		$sql = "INSERT INTO `add client`(`ID`, `Name`, `Surname`, `Gender`, `ID number`, `Date of birth`, `email_of_user`) VALUES (null,'$this->name_p','$this->surname_p','$this->gender_p','$this->ID_number_p','$this->date_of_birth', '$this->session')";

		$run_sql = $this->db_connect()->query($sql);

		if(!$run_sql){
			echo "query did not run";
		}
		else{
			echo "Upload was a success";
		}
	}

//check if client is in the db
	public function check_client(){
		$sql = "SELECT * FROM `add client` WHERE `ID number` = '$this->ID_number_p' AND `email_of_user` = '$this->session'";

		$sql_run = $this->db_connect()->query($sql);

		$rows = $sql_run->fetch_assoc();
		
		$id_number = $rows["ID number"];
		$email = $rows["email_of_user"];
		
		if($id_number == $this->ID_number_p AND $email == $this->session)
		{
			die("Client with this ID number is already added");
		}

	}

//get_clients methode
	public function get_clients(){
		$sql = "SELECT * FROM `add client` where `email_of_user` = '$this->session'";

		$this->sql_run = $this->db_connect()->query($sql);
	}

//pagenation method
	public function pagenation($result_in_one_page){
		$results_per_page = $result_in_one_page;

		$number_of_results = $this->sql_run->num_rows;

		$this->num_of_pages = ceil($number_of_results/$results_per_page);

		if(!isset($_GET['page'])){
			$page = 1;
		}
		else{
			$page = $_GET['page'];
		}

		$first_results = ($page-1)*$results_per_page;

		$sql2 = "SELECT * FROM `add client` where `email_of_user` = '$this->session' LIMIT ".$first_results.",".$results_per_page;

		$this->sql_run2 = $this->db_connect()->query($sql2);
}

//get number of rows
	public function geNumRows()
	{
		$rows = $this->sql_run2->num_rows;
		return $rows;
	}

//show results methode
	public function show_results(){
			while($row = $this->sql_run2->fetch_array())
			{
				$name = $row["Name"];
				$surname = $row["Surname"];
				$gender = $row["Gender"];
				$ID_number = $row["ID number"];
				$date_of_birth = $row["Date of birth"];
				$ID = $row["ID"];

				//echo "Name: ".$name."<br>Surname: ".$surname."<br>Gender: ".$gender."<br>ID number: ".$ID_number."<br>Date of birth: ".$date_of_birth."<br>"."<hr>";
			
				echo "<tr>";
				echo "<td>".$name."</td>";
				echo "<td>".$surname."</td>";
				echo "<td>".$gender."</td>";
				echo "<td>".$ID_number."</td>";
				echo "<td>".$date_of_birth."</td>";
				echo "<td><form action = 'delete.php' method = 'post'><input type = 'hidden' name = 'ID' value = ".$ID."></td>";
				echo "<td><input type = 'hidden' name = 'ID_number' value = ".$ID_number."></td>";
				echo "<td><input type = 'submit' name = 'submit' value = Delete onclick='delete_js()'></td>";
				echo "</form></tr>";
			}
		for($page = 1; $page <= $this->num_of_pages; $page++){
			echo "<a href = 'get_client_html.php?page=".$page."'>".$page."</a>";
		}
	}

	//delete function
	public function delete(){

		$ID = $_POST['ID'];
		$ID_number = $_POST['ID_number'];

		$sql = "DELETE FROM `add client` WHERE `add client`.`ID` = '$ID'";

		$sql2 = "DELETE FROM `cases` WHERE `cases`.`ID number` = '$ID_number'";

		$sql_run = $this->db_connect()->query($sql);

		$sql_run2 = $this->db_connect()->query($sql2);

		if(!$sql_run || !$sql_run2)
			{
				echo "query did not run";
			}
			else
			{
				header("refresh:1; url=get_client_html.php");
			}
	}

	public function show_results_table(){
		while($row = $this->sql_run2->fetch_array())
		{
			$name = $row["Name"];
			$surname = $row["Surname"];
			$gender = $row["Gender"];
			$ID_number = $row["ID number"];
			$date_of_birth = $row["Date of birth"];
			$ID = $row["ID"];
			$_SESSION["id_number"] = $ID_number;

			echo "<tr><form action = 'update.php' method = 'post'>";
			echo "<td><input type = 'text' name = 'name' value = ".$name."></td>";
			echo "<td><input type = 'text' name = 'surname' value = ".$surname."></td>";
			echo "<td><input type = 'text' name = 'gender' value = ".$gender."></td>";
			echo "<td><input type = 'number' name = 'ID_number' value = ".$ID_number."></td>";
			echo "<td><input type = 'date' name = 'date_of_birth' value = ".$date_of_birth."></td>";
			echo "<td><input type = 'hidden' name = 'ID' value = ".$ID."></td>";
			echo "<td><input type = 'submit' name = 'submit' value = submit></td>";
			echo "</form></tr>";
			//include other file....
		}
		for($page = 1; $page <= $this->num_of_pages; $page++){
			echo "<a href = 'update_html.php?page=".$page."'>".$page."</a>";
		}
	}
	public function update_methode(){
			session_start();
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$gender = $_POST['gender'];
			$ID_number = $_POST['ID_number'];
			$date_of_birth = $_POST['date_of_birth'];
			$ID = $_POST['ID'];
			$idNUmber = $_SESSION["id_number"];

			$sql_update ="UPDATE `add client` SET `Name` = '$name', `Surname` = '$surname', `Gender` = '$gender', `ID number` = '$ID_number', `Date of birth` = '$date_of_birth' WHERE `ID` = '$ID'";

			$sql_update2 = "UPDATE `cases` SET `ID number` = '$ID_number' WHERE `ID number` = '$idNUmber'";

			if($idNUmber != $ID_number)
			{
				$sql_update_run = $this->db_connect()->query($sql_update);

				$sql_update_run2 = $this->db_connect()->query($sql_update2);
			}

			else
			{
				$sql_update_run = $this->db_connect()->query($sql_update);
			}

			if(!$sql_update_run){
				echo "query did not run";
			}
			else{
				header("refresh:1; url=update_html.php");
			}
	}
	public function page_number(){
		for($page = 1; $page <= $this->num_of_pages; $page++){
			echo "<a href = 'update_html.php?page=".$page."'>".$page."</a>";
		}
	}
	
	public function inser_info()
	{
		$sql = "SELECT * FROM `add client` where `ID number` = '$this->ID_number_p' AND `email_of_user` = '$this->session'";

		$sql_run = $this->db_connect()->query($sql);

		$row = $sql_run->fetch_assoc();
		$info = array($row["Name"], $row["Surname"], $row["Gender"], $row["Date of birth"]);
		//$surname = $row["Surname"];
		//$gender = $row["Gender"];
		//$date_of_birth = $row["Date of birth"];

		return $info;
	}

}
?>

