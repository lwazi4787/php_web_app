<?php

include "classes/access_db.inc.php";
include "classes/insert_client.inc.php";

//session_start();

$get_client_object = new add_client("", "", "", "", "", $_SESSION["email"]);

$get_client_object->get_clients("");
$get_client_object->pagenation(7);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

if($get_client_object->geNumRows() == 0)
{
	echo "<h4 style = 'color: green'>No results</h4>";
}
else{
echo "<table style='width: 100%'><tr><th>Name</th><th>surname</th><th>Gender</th><th>ID number</th><th>Date of birth</th></tr>";
	$get_client_object->show_results();
}
?>
</table>

</body>
</html>