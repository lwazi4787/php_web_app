<?php

//include "classes/access_db.inc.php";
//include "classes/register.inc.php";

$email = $_SESSION["email"];

$object = new register("", "", $email, "");


$object->get_name();

?>