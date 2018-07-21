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
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Content Creator</h3>
					<form name="signup" onsubmit="return validateForm();" action="backend/signupcreator.php" method="post">
						<table id="signup_tble">
							<tr>
								<td>First Name</td>
								<td>Last Name</td>
							</tr>
							<tr>
								<td><input type="text" name="fname" value="" spellcheck="false"  /></td>
								<td><input type="text" name="lname" value="" spellcheck="false" /></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><input type="text" name="phone" value="" autocomplete="of"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="email" name="email" value="" spellcheck="false" autocomplete="off" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password" value="" spellcheck="false" autocomplete="off" /></td>
							</tr>
							<tr>
								<td>Sex </td><td>Female<input type="radio" name="gend" value="f" />
									 Male<input type="radio" name="gend" value="m" /></td>
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