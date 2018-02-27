</script>

<?php

include "classes/access_db.inc.php";
include "classes/insert_client.inc.php";

$delete_object = new add_client("", "", "", "", "", "");

$delete_object->delete();


?>