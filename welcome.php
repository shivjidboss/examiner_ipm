<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<link href="/ipm/css/welcome.css" type="text/css" rel="stylesheet" />
<?php session_start(); ?>  
</head>

<body>
<!--
<div id="bubbles">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
</div>-->
<div id="mainlogo"></div>
<?php
	
	if(!isset($_COOKIE['active']))
		header("Location:index.php");
	if(isset($_SESSION['userid']))
	{
		if(isset($_SESSION['authority']))
		{
			if($_SESSION['authority']=="admin" || $_SESSION['authority']=="content" )
				header("Location:adminprofile.php");
		}
		else
			header("Location:profile.php");			
	}
?>

<div id="loginegg">
	<div id="login">
			<form name="login" action="backend/login.php" method="post">
			<h3>Student Login</h3>
				<table id="login_tabl">
				<colgroup>
					<col />
					<col />
				</colgroup>
					<tr>
						<td>
							UserId
						</td>
						<td>
   							<input type="text" name="username" value="" class="bg2none" style="background-color:#fff;">
   						</td>
					</tr>
					<tr>
						<td>
							Password
						</td>
    					<td>
    						<input type="password" name="password" value="" class="bg2none" style="background-color:#fff;">
    					</td>

					</tr>
					<tr>
						<td></td>
						<td>
    						<input class="submit" type="submit" name="submit" value="Login">
    					</td>
    				</tr>
    				<tr>
    					<td></td>
						<td>
							<button class="nobutton" type="button" onClick="contactadmin()">Forgot Password</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
<div id="calladmin"></div>
<div id="adminlink"><a class="sdbarlinks" href="adminlogin.php">Admin Login</a><br></div>
<div id="footer" style="color: aqua;">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>