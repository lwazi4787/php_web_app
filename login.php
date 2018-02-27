<?php

include "classes/access_db.inc.php";
include "classes/register.inc.php";

session_start();

$input_test_object = new register("", "", "", "");

$password = $input_test_object->test_input($_POST["password"]);
$email = $input_test_object->test_input($_POST["Email"]);
$_SESSION["email"] = $email;

$object = new register("", "", $email, $password);

$object->login();

?>