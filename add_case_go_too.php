<?php

include "classes/access_db.inc.php";
include "classes/add_case.inc.php";
include "classes/select_id_number.inc.php";
include "classes/insert_client.inc.php";


//session_start();
$ID_number = $_POST["ID_number"];
$amount = $_POST["amount"];
$claim_date = $_POST["claim_date"];
$user_email = $_SESSION["email"];

//connect db object
$object = new db_connect_clss();

//get client by id
$client_info_object = new add_client("", "", "", $ID_number, "", $user_email);
$info = $client_info_object->inser_info();

//check if client is added on client database
$select_id_object = new select_id($ID_number, $user_email);
$select_id_object->select_id();


//insert case on database
$add_case_object = new add_case($info[0], $info[1], $info[2], $ID_number, $info[3], $amount, $claim_date, $user_email);
$add_case_object->add_case();

?>