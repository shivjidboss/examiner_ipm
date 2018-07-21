<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>
<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/login.css" type="text/css" rel="stylesheet" />
	
	<div id="topbar">
		<div id="login">
			<form name="login" action="backend/login.php" method="post">
				<table id="login_tabl">
					<tr>
						<td>
							<?php
							 session_start();
							 if(isset($_SESSION['userid']))
							  echo ("<h3> USERID: ".$_SESSION['userid']."</h3> </td");
							 ?>
						</td>
					</tr>
					<tr>
				</table>
			</form>
		</div>
		<div id="title">IPM</div>
	</div>



</head>

<body>
<h3>Admin</h3>
<a href="adminlogin.php">Admin Login</a><br>
<a href="signup.php">SignUp</a><br>
<a href="managecourse.php">Manage Course</a><br>
<a href="qnpcreator.php">Question paper Creator</a><br>
<a href="manageqp.php">Qp Manage</a><br>

<!-- Inser Admin pages here-->
<hr>

<h3>Student</h3>
<a href="welcome.php">Welcome (new login)</a><br>
<a href="profile.php">Profile</a><br>
<a href="subjectselect.php">Qp Bank</a><br>
<a href="rankindex.php">Rank Index</a><br>
<a href="logout.php">Logout</a><br>

<!-- Inser Student pages here-->
<hr>

<h3>Dev tools</h3>
<a href="whatiknow.php">What do I know about you?</a><br>
<a href="ckeset.php">Set Cookie</a>

<!-- Inser debugging tools here-->
</body>
</html>