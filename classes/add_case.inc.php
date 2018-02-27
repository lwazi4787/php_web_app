<?php

	/**
	* 
	*/
	class add_case extends db_connect_clss
	{
		private $nme, $srnme, $sex, $ID_number_p, $dateOfBirth, $amount_p, $claim_date_p, $sql_run2, $number_of_pages, $session;

		public function __construct($name, $surname, $gender, $ID_number, $date_of_birth, $amount, $claim_date, $user_email)
			{
				$this->ID_number_p = $ID_number;
				$this->amount_p = $amount;
				$this->claim_date_p = $claim_date;
				$this->session = $user_email;
				$this->nme = $name;
				$this->srnme = $surname;
				$this->sex = $gender;
				$this->dateOfBirth = $date_of_birth;
			}

		public function add_case()
		{
			$sql = "INSERT INTO `cases` (`ID`, `Name`, `Surname`, `Gender`, `ID number`, `Date_of_birth`, `Amount`, `Claim date`, `User email`) VALUES (NULL, '$this->nme', '$this->srnme', '$this->sex', '$this->ID_number_p', '$this->dateOfBirth', '$this->amount_p', '$this->claim_date_p', '$this->session');";

			$sql_run = $this->db_connect()->query($sql);

			if(!$sql_run)
			{
				echo "query did not run";
			}
			else
			{
				echo "query run was a success";
			}
		}
		public function show_cases($results_in_a_page)
		{
			$Sql = "SELECT * FROM `cases` WHERE `User email` = '$this->session'";

			$sql_run = $this->db_connect()->query($Sql);

			$results_per_page = $results_in_a_page;
			$total_number_of_results = $sql_run->num_rows;

			$this->number_of_pages = ceil($total_number_of_results/$results_per_page);

			if(!isset($_GET['page'])){
				$page = 1;
			}
			else{
				$page = $_GET['page'];
			}

			$starting_number = ($page-1)*$results_per_page;

			$Sql2 = "SELECT * FROM `cases` WHERE `User email` = '$this->session' LIMIT ".$starting_number.",".$results_per_page;

			$this->sql_run2 = $this->db_connect()->query($Sql2);
		}

		public function geNumRows()
		{

		$rows = $this->sql_run2->num_rows;
		return $rows;
		
		}

		public function show_results(){
			while($rows = $this->sql_run2->fetch_assoc())
			{
				$Name = $rows["Name"];
				$Surname = $rows["Surname"];
				$Gender = $rows["Gender"];
				$id_number = $rows["ID number"];
				$Date_of_birth = $rows["Date_of_birth"];
				$amount = $rows["Amount"];
				$claim_date = $rows["Claim date"];
				$ID = $rows["ID"];
				$_SESSION['name'] = $Name;
				$_SESSION['surname'] = $Surname;
				$_SESSION['gender'] = $Gender;
				$_SESSION['Date_of_birth'] = $Date_of_birth;
				//echo "ID number:".$id_number."<br>Amount:".$amount."<br>Claim date:".$claim_date."<hr>";

				echo "<tr>";
				echo "<td>".$id_number."</td>";
				echo "<td>".$amount."</td>";
				echo "<td>".$claim_date."</td>";
				echo "<td><form action = 'delete_case.php' method = 'post'><input type = 'hidden' name = 'id' value = ".$ID."></td>";
				echo "<td><input type = 'submit' name = 'submit' value = 'Delete'></td></form>";

				echo "<td><form action = 'info_html.php' method = 'post'><input type = 'hidden' name = 'id' value = ".$ID."></td>";
				echo "<td><input type = 'submit' name 'submit' value = 'Show info'></form></td>";
				
				echo "</tr>";
			}

			for($page = 1; $page <= $this->number_of_pages; $page++){
				echo "<a href = 'show_cases_html.php?page=".$page."'>".$page."</a>";
			}
		}

		public function get_info(){
			//session_start();
			 $id = $_POST["id"];
			$user_email = $_SESSION["email"];

			$sql = "SELECT * FROM `cases` WHERE `ID` = '$id' AND `User email` = '$user_email'";

			$sql_run = $this->db_connect()->query($sql);

			while($rows = $sql_run->fetch_assoc())
			{
				$Name = $rows["Name"];
				$Surname = $rows["Surname"];
				$Gender = $rows["Gender"];
				$id_number = $rows["ID number"];
				$Date_of_birth = $rows["Date_of_birth"];
				$amount = $rows["Amount"];
				$claim_date = $rows["Claim date"];
				$ID = $rows["ID"];

			echo "Name: ".$Name."<br><br>Surname: ".$Surname."<br><br>Gender: ".$Gender."<br><br>Date of birth: ".$Date_of_birth."<br><br><button id = 'btn'><a href = 'show_cases_html.php'>Go back!</a></button>";
		}
	}

		public function delete_case(){
			$id = $_POST["id"];

			$sql = "DELETE FROM `cases` WHERE `cases`.`ID` = '$id'";

			$sql_run = $this->db_connect()->query($sql);

			if(!$sql_run)
			{
				echo "query did not run";
			}
			else
			{
				header("refresh:1; url=show_cases_html.php");
			}
		}

		public function show_results_table_form(){
			//session_start();
			while($rows = $this->sql_run2->fetch_assoc()){
				$id_number = $rows["ID number"];
				$amount = $rows["Amount"];
				$claim_date = $rows["Claim date"];
				$ID = $rows["ID"];
				$_SESSION["id_number"] = $id_number;


				echo "<tr><form action = 'update_cases.php' method = 'post'>";
				echo "<td><input type = 'number' name = 'id_number' value = ".$id_number."></td>";
				echo "<td><input type = 'text' name = 'amount' value = ".$amount."></td>";
				echo "<td><input type = 'date' name = 'claim_date' value = ".$claim_date."></td>";
				echo "<td><input type = 'hidden' name = 'id' value = ".$ID."></td>";
				echo "<td><input type = 'submit' name = 'submit' value = 'submit'></td></form></tr>";
			}
			for($page = 1; $page <= $this->number_of_pages; $page++){
				echo "<a href = 'show_cases_updates_html.php?page=".$page."'>".$page."</a>";
			}
		}

		public function update_case(){
			session_start();
			$id_number = $_POST["id_number"];
			$amount = $_POST["amount"];
			$claim_date = $_POST["claim_date"];
			$id = $_POST["id"];
			$idNUmber = $_SESSION["id_number"];

			$sql_update = "UPDATE `cases` SET `ID number` = '$id_number' , `Amount` = '$amount' , `Claim date` = '$claim_date' WHERE `ID` = '$id'";

			$sql_update2 = "UPDATE `add client` SET `ID number` = '$id_number' WHERE `ID number` = '$idNUmber'";

			if($idNUmber != $id_number)
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
				header("refresh:1; url=show_cases_updates_html.php");
			}
		}
	}

?>