<?php

include "classes/access_db.inc.php";
include "classes/register.inc.php";

session_start();

$input_test_object = new register("", "", "", "");



$firstname = $input_test_object->test_input($_POST["Firstname"]);
$surname = $input_test_object->test_input($_POST["Surname"]);
$email = $input_test_object->test_input($_POST["Email"]);
$password = $input_test_object->test_input($_POST["password"]);
$confirm_password = $input_test_object->test_input($_POST["confirm_password"]);
$_SESSION["empty_not"] = "Both password fields must be the same";
$_SESSION["email"] = $email;


$check_user_object = new register("", "", $email, "");
$check_user_object->check_users();

$object = new register($firstname, $surname, $email, $password);

if($password == $confirm_password)
{
	$object->register();
}
else
{
	header("refresh:1; url=homepage2.php");
}
?>