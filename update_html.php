<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
		body{
			//`text-align: left;
			background-color: #ffffcc;
			margin: 0%;
		}
		#main_section{
			background: #ffffcc;
			//text-align: left;
			margin-left:5%;
			width: 100%;
		}
		#form_hading{
			color: #666633;
		}
		#section_id{
			width: 69%;
			margin-left: 2%;
		}
		table{
			width: 500px;
		}

		//added
	header{
		background-color: #99cccc;
		color: white;
	}
	#first_layer{
		width: 74%;
		text-align: left;
		margin: 0px auto;
		//border: 1px solid black;
	}
	#form_heading{
		//float: right;
		text-align: right;
		margin-top: 4%;
		margin-left: 60%;
		color:green;
		font-size: 14px;
	}
	#heading_box{
		display: -webkit-box;
	    -webkit-box-orient: horizontal;
	    //background-color: #fac305;
		//color: white;
		//border: 1px solid black;
	}
		#form{
		float:right;
		margin-left: 40%;
	}
	</style>
</head>
<body>
<header>
<div id = "first_layer">
<div id = "heading_box"><h1 id="heading">Netbase</h1><div id = "form_heading"><?php session_start(); echo $_SESSION["email"]; ?></div></div></div></header>
<nav></nav>

<div id = "main_section">
<aside>
	<ul style="list-style-type: none">
		<li><a href="add_client.php" class = "side_list">Add client</a></li><hr>
		<li><a href="add_case.php" class = "side_list">Add case</a></li><hr>
		<li><a href="get_client_html.php" class = "side_list">Show clients</a></li><hr>
		<li><a href="show_cases_html.php" class = "side_list">Show cases</a></li><hr>
		<li><a href="update_html.php" class = "side_list">Change client info</a></li><hr>
		<li><a href="show_cases_updates_html.php" class = "side_list">Change case info</a></li><hr>
		<li><a href="logout.php" class = "side_list">Logout</a></li><hr>
	</ul>
</aside>

<section id = "section_id">
	<h2 id = "form_hading">Change client info</h2>
	<?php
		include "edit_client_included.php";
	?>
</section>
</div>

</body>
</html>