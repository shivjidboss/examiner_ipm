<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

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
	<div id= 'notification' class="cusscroll" >
	 <?php
		include("shownotification.php");
	?>	
	</div>
	<div id="leftpane">
		<?php include("adminsidebar.php");	?>
	</div>
	<div id="surface">
		<div id="body_card">
			<div id="signupform">
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Delete Student</h3>
					<form name="signup" onsubmit="return validateForm();" action="backend/unsign.php" method="post">
						<table id="signup_tble">
							<tr>
								<td>User Id</td>
								<td><input type="text" name="userid" value="" /></td>
							</tr>
							<tr>
								<td>Admin Password</td>
								<td><input type="password" name="password" value="" autocomplete="off"></td>
							</tr>
							<?php
								if(isset($_COOKIE['authenpass'])&& $_COOKIE['authenpass']== "wrong")
									{
										echo("<tr><td></td><td colspan='2''><font color='#C00609'>Enter admin password!</font></td><tr>");
										unset($_COOKIE['authenpass']);
									}
							?>		
							<tr>
								<td colspan="2"><center><input type="submit" name="submit" value="Remove" class="submit" /></center></td>
							</tr>
						</table>
						<input type="hidden" name="usrcatg" value="student" />
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