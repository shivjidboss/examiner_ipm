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
		<div class="gendicon <?php echo ('male'); ?>"</div>
	</div>
</div>

<div id="main">
	<div id="leftpane">
		<?php include("adminsidebar.php");	?>
	</div>
	<div id="surface">
		<div id="body_card">
			<?php
				$id = $_POST['id'];
				$tablename = "notification";
				include ('backend/mysqli_plug.php');
				$query ="SELECT * FROM $tablename WHERE id = '$id';";
				$result=mysqli_query($db,$query);
				$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

				$message = $result['message'];
				$subject = $result['subject'];
				$status = $result['enable'];	
			?>
			<div id="signupform">
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Edit Notification</h3>
					<form name="notification" action="backend/editnotificationbackend.php" method="post">
						<table id="notificationTable">
							<tr>
								<td><font color="#191616"><h5><?php echo($id);?></font></h5></td>
								<input type="hidden" name="id" value="<?php echo($id);?>"/>
							</tr>
							<tr>
								<td>Subject</td>
							</tr>
							<tr>
								<td><textarea name = "subject" rows = "1" cols = "50"><?php echo($subject);?></textarea></td>
							</tr>
							<tr>
								<td>Message</td>
								<td></td>
							</tr>
							<tr>
								<td><textarea name = "message" rows = "3" cols = "50"><?php echo($message);?></textarea></td>
							</tr>
							<tr>
								<td>Status</td>
							</tr>
							<tr>	
								<td colspan="5"><center>
								<?php
								
									if($result['enable']==1)
										echo "<font color='#2BF30C' face='Tahoma, Geneva, sans-serif'>Enabled</font><input type='radio' name='status' value='1' checked='checked'> Disable<input type='radio' name='status' value='0'>";
								
									else
										echo("Enable<input type='radio' name='status' value='1'><font color='#C90104' face='Tahoma, Geneva, sans-serif'>Disabled</font><input type='radio' name='status' value='0' checked='checked'>");
								?>
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