<?php

//session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">

	body{
		//color:red;
		//background: rgba(200, 255, 255, 1);
		//background: #fff5cc;
		text-align: center;
		margin: 0px;
		background-color: #ffffcc;
	}

	#id_nav{
		width: 100%;
		height: 5%;
		background: orange;
	}
	#main_section{
		//background: #ccffff;
		border-radius: 10px;
		///border: 1px solid grey;
		///box-shadow: 1px 3px 6px grey;
	}
	#button{
		background: #5af7cd;
		border: none;
		padding: 5px;
		padding-right: 50px;
		padding-left: 50px;
		border-radius: 5px;
		margin-bottom: 10px;
		cursor: pointer;
	}
	#id_footer{
		color: black;
		background-color: #cec5a2;
		padding: 1px;
	}
	.first_layer{
		width: 1000px;
		//border: 1px solid black;
		margin: 0px auto;
		text-align: left;
		color: red;
	
	}
	#footer_nav_list{
		padding-right : 25px;
		color: rgba(30, 30, 30, 1);
	}
	footer li{
		display: inline;
	}
	#special{
		text-align: right;
		float: right;
		color: rgba(30, 30, 30, 1);
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
	#developer{
		font-size: 12px;
		color: rgba(30, 30, 30, 1);
	}
	.side_list{
		text-decoration: none;
		color: #666633;
	}
	.side_list:hover{
		color: #cccc99;
	}
	</style>
</head>
<body>
<header>
<div id = "first_layer">
<div id = "heading_box"><h1 id="heading">Netbase</h1><div id = "form_heading"><?php session_start(); echo $_SESSION["email"]; ?></div></div></div></header>
<nav id = "id_nav"></nav>

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
	<h2 id = "form_hading">Add client</h2>
	<form action="add_client_go_too_html.php" method="post" id = "main_form">
		<input type="text" name="name" placeholder="Name" id="input_form" required><br><br>
		<input type="text" name="surname" placeholder="Surname" id="input_form" required><br><br>
		gender: <input type="radio" name="gender" value="male" required> Male <input type="radio" name="gender" value="female" required> Female<br><br>
		<input type="number" name="ID_number" placeholder="ID number" id="input_form" required><br><br>Date of birth<br><br>
		<input type="date" name="date_of_birth" placeholder="date of birth" id="input_form" required><br><br>
		<input type="submit" name="submit" id = "button">
	</form>
</section>
</div>

</body>
</html>