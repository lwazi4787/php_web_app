<?php

include "classes/access_db.inc.php";
include "classes/insert_client.inc.php";

//session_start();

$name = $_POST["name"];
$surname = $_POST["surname"];
$gender = $_POST["gender"];
$ID_number = $_POST["ID_number"];
$date_of_birth = $_POST["date_of_birth"];
$user_email = $_SESSION["email"];

$insert_client = new add_client($name, $surname, $gender, $ID_number, $date_of_birth, $user_email);

$insert_client->check_client();
$insert_client->add_client();

?>