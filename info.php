<?php

include "classes/access_db.inc.php";
include "classes/add_case.inc.php";

//session_start();
$user_email = $_SESSION["email"];

$show_cases_object = new add_case("", "", "", "", "", "", "", $user_email);


$show_cases_object->show_cases(7);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
	
	#ancer{
		text-decoration: none;
		color: black;
	}
	#modal_container{
		width: 100%;
		height: 100%;
		position: fixed;
		background: rgba(2, 70, 88, 0.3);
		margin: 0px;
		opacity: 0;
		transition: all 500ms ease;
	}
	#modal_container:target{
		opacity: 1px;
		pointer-events: auto;
	}
	#btn{
		text-decoration: none;
		color:black;
	}
		
</style>

</head>
<body>
<?php

if($show_cases_object->geNumRows() == 0)
{
	echo "<h4 style = 'color: green'>No results</h4>";
}
else{
	$show_cases_object->get_info();
}
?>
</table>

</body>
</html>