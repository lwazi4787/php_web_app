



<?php

include "classes/access_db.inc.php";
include "classes/insert_client.inc.php";

$edit_client_collect_methode = new add_client("", "", "", "", "", $_SESSION["email"]);

$edit_client_collect_methode->get_clients();

$edit_client_collect_methode->pagenation(5);

?>

<?php

if($edit_client_collect_methode->geNumRows() == 0)
{
	echo "<h4 style = 'color: green'>No results</h4>";
}
else{
echo "<table style='width: 100%'><tr><th>Name</th><th>Surname</th><th>Gender</th><th>ID number</th><th>Date of birth</th></tr>";
		$edit_client_collect_methode->show_results_table();
echo  "</table>";
}

?>
