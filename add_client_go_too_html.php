<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
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
		<li><a href="add_client.php" class = "side_list">Change client info</a></li><hr>
		<li><a href="add_client.php" class = "side_list">Change case info</a></li><hr>
		<li><a href="logout.php" class = "side_list">Logout</a></li><hr>
	</ul>
</aside>

<section id = "section_id">
	<h2>Add client</h2>
	<?php
		include "add_client_go_too.php";
	?>
</section>
</div>
</body>
</html>