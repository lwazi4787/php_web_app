<?php

include "classes/access_db.inc.php";
include "classes/add_case.inc.php";

//session_start();

$user_email = $_SESSION["email"];

$show_cases_update_object = new add_case("", "", "", "", "", "", "", $user_email);

$show_cases_update_object->show_cases(5);
?>


<?php

if($show_cases_update_object->geNumRows() == 0)
{
	echo "<h4 style = 'color: green'>No results</h4>";
}
else{ echo "<table style='width: 100%'><tr><th>ID number</th><th>Amount</th><th>Claim date</th></tr>";
$show_cases_update_object->show_results_table_form();
}
?>
</table>