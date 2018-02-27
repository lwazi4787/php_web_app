<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			text-align: center;
			font-family: tahoma;
			margin: 0px;
		}
		header{
			background-color: #fac305;
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
			margin-top: 3%;
			margin-left: 45%;
		}
		#heading_box{
			display: -webkit-box;
	        -webkit-box-orient: horizontal;
	        //background-color: #fac305;
			//color: white;
		}
		#form{
			float:right;
			margin-left: 40%;
		}
		#heading{

		}
		section{
			text-align: center;
			background-color: #ffffcc;
			padding: 1px;
		}
		#form_input{
			padding: 10px;
			border-radius: 5px;
			border-style: none;
			border: 1px solid #cccc99;
		}
		#form_input_button{
			padding: 5px;
			padding-right: 50px;
			padding-left: 50px;
			margin-bottom: 5%;
			background-color: #05fa9b;
			border-style: none;
			border: 1px solid green;
			border-radius: 5px;
			cursor: pointer;
			box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 10px rgba(255, 255, 255, 0.2), inset 0 10px 20px rgba(255, 255, 255, 0.25),
			inset 0 -15px 30px rgba(0, 0, 0, 0.3);
			color: white;
		}
		#main_section_form{
			margin-top: 6%;
		}
		#id_footer{
			color: black;
			background-color: #cec5a2;
			padding: 1px;
			//margin: 0% auto;
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
			font-size: 13px;
		}
		footer li{
			display: inline;
		}
		#special{
			text-align: right;
			float: right;
			color: rgba(30, 30, 30, 1);
			font-size: 13px;
		}
		#footer_nav_list2{
			padding-right : 95px;
			color: rgba(30, 30, 30, 1);
			font-size: 13px;
		}
		#developer{
			font-size: 12px;
			color: rgba(30, 30, 30, 1);
			text-align: right;
			//margin-bottom: 0px;
		}
	</style>

<body>
	<?php
	//session_start();
	//$empty_not = "";
	//$_SESSION["empty_not"] = $empty_not;
	$err = "";
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if($_POST["password"] != $_POST["confirm_password"])
			{
				$err = "Both password fields must be the same";
			}
			
		}
	?>
<header>
<div id = "first_layer">
<div id = "heading_box"><h1 id="heading">Netbase</h1> <div id = "form_heading"><form id = "form." action="login.php" method="post"><input type="text" name="Email" placeholder="Email">&nbsp;<input type="password" name="password" placeholder="password">&nbsp;<input type="submit" name="Login" value="Login"></form></div></div></header>

<section>
	<form id="main_section_form" action="register.php" method="post">
		<?php echo $err; ?>
	<h1>Register</h1>
		<input type="text" name="Firstname" placeholder="Firstname" id = "form_input" required><br><br>
		<input type="text" name="Surname" placeholder="Surname" id = "form_input" required><br><br>
		<input type="text" name="Email" placeholder="Email" id = "form_input" required><br><br>
		<input type="password" name="password" placeholder="New password" id = "form_input" required><br><br>
		<input type="password" name="confirm_password" placeholder="Confirm password" id = "form_input" required><br><br>
		<input type="submit" name="Register" value="Register" id = "form_input_button" required><br>
	</form>
</section>
</div>
<footer id = "id_footer">
	<div class = "first_layer">
		<ul style="list-style-type: none">
			<li id = "footer_nav_list">Policy</li>
			<li id = "footer_nav_list">Terms</li>
			<li id = "footer_nav_list2">information</li>
			<li id = "footer_nav_list">About Us</li>
			<li id = "footer_nav_list">Contact Us</li>
			<li id = "special">Netbase &copy; Copyright 2018</li>
		</ul>
		<p id = "developer">Web developer: lwazi4787@gmail.com</p>
	</footer>
</body>
</html>

<?php
$message = "";
?>