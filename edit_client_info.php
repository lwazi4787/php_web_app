<?php

include "classes/access_db.inc.php";
include "classes/insert_client.inc.php";

$edit_client_object = new add_client("", "", "", "", "");

$edit_client_object->get_clients("Edit");

?>