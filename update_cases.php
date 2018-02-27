<?php

include "classes/access_db.inc.php";
include "classes/add_case.inc.php";

$show_cases_go_to_update_object = new add_case("", "", "", "", "", "", "", "");

$show_cases_go_to_update_object->update_case();



?>