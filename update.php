<?php

include "classes/access_db.inc.php";
include "classes/insert_client.inc.php";

$update_object = new add_client("", "", "", "", "", "");

$update_object->update_methode();

?>