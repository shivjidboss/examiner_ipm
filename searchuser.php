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
<script src="/ipm/js/searchuser.js"></script>
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
			<div>
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Search Student</h3>
					<form name="searchusr">
						<table id="signup_tble">
							<tr>
								<td><input type="radio" name="isset" value="1" id="srchid"></td>
								<td>User Id</td>
								<td><input type="text" name="userid" value="" spellcheck="false" onfocus="srchusradioctrl(1)" /></td>
							</tr>
							<tr>
								<td><input type="radio" name="isset" value="2" id="srchname"></td>
								<td>Name</td>
								<td><input type="text" name="name" value="" spellcheck="false" onfocus="srchusradioctrl(2)" /></td>
							</tr>
							<tr>
								<td><input type="radio" name="isset" value="3" id="srchphn"></td>
								<td>Phone</td>
								<td><input type="text" name="phone" value="" autocomplete="off" onfocus="srchusradioctrl(3)" /></td>
							</tr>
							<tr>
								<td><input type="radio" name="isset" value="4" id="srchmail"></td>
								<td>Email</td>
								<td><input type="email" name="email" value="" spellcheck="false" autocomplete="off" onfocus="srchusradioctrl(4)" /></td>
							</tr>
							<tr>
								<td></td>
								<td><center><input type="reset" name="reset" value="Clear" class="button medbtn" onClick="cleartable();" /></center></td>
								<td><center><input type="button" name="submit" value="Search" class="submit" onClick="searchrecord();" /></center></td>
							</tr>
						</table>
					</form>  
				</font> 
			</div><br><br>
			<div>
				<table class="tbl" id="sresulttbl">
					
				</table>
			</div>
			<form name="viewprof" method="POST" action="studprofview.php">
				<input type="hidden" name="uid" value="" />
			</form>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>