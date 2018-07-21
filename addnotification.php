<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Notification</title><title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<link href="/ipm/css/signup.css" type="text/css" rel="stylesheet" />

<?php session_start(); ?>  
</head>

<body>
<div id="topbar">
	<div id="mainlogo"></div>
	<div id="tpbarright">
		<div id="tpbartxt">
				<?php
					if(isset($_SESSION['userid']))	
					 {echo ("USERID: ".$_SESSION['userid']);
					  echo("<a class='button logout' href='logout.php'>Logout</a>");
					 }
					else	
						header("Location:adminlogin.php");
				?>
		</div>
		<div class="gendicon <?php echo ('male'); ?>"></div>
	</div>
</div>

<div id="main">
	<div id="leftpane">
		<?php include("adminsidebar.php");	?>
	</div>
	<div id="surface">
		<div id="body_card">
			<div id="signupform">
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Notifications</h3>
					<form name="notification" action="backend/addnotificationbackend.php" method="post">
						<table id="notificationTable">
							<tr>
								<td>Subject</td>
							</tr>
							<tr>
								<td><textarea name = "subject" rows = "1" cols = "50"></textarea></td>
							</tr>
							<tr>
								<td>Message</td>
								<td></td>
							</tr>
							<tr>
								<td><textarea name = "message" rows = "3" cols = "50"></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" name="submit" value="Submit" class="submit" /></center></td>
							</tr>
						</table>
					</form>  
				</font> 
			</div>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>