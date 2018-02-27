<?php
include "classes/access_db.inc.php";
include "classes/add_case.inc.php";

$object = new add_case("", "", "", "", "", "", "", "");

$object->delete_case();

?>