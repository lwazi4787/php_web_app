<?php

include "classes/access_db.inc.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
		
		#main_section{
			//background: #ccccff;
		}
		#button{
			background: #ccccff;
		}
		#form_hading{
			color: #333366;
		}
		#form_heading{
		//float: right;
		text-align: right;
		margin-top: 4%;
		margin-left: 60%;
		color:green;
		font-size: 14px;
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
	<h2 id = "form_hading">Add case</h2>
	<form action="add_case_go_too_html.php" method="post">
		<input type="text" name="ID_number" placeholder="ID number" id="input_form" required><br><br>
		<input type="text" name="amount" placeholder="Amount e.g R150.00" id="input_form" required><br><br>Claim date<br><br>
		<input type="date" name="claim_date" placeholder="Claim date" id="input_form" required><br><br>
		<input type="submit" name="submit" id = "button">
	</form>
</section>
</div>
</body>
</html>