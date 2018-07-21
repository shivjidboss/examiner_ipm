<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
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
			<?php

			if($_COOKIE['tempmessage']=="Student Detail Entered!")
			{
				echo "
			<h3>".$_COOKIE['tempmessage']."</h3>
			<div class='checkmark'></div>
			<table class='tbl'>
				<tr>
					<td>Image Id:</td>
					<td>
					";
					if($_COOKIE['imgid']!= "noimgid")
					{	
						echo "<img src='resources/uploads/imgid/".$_COOKIE['imgid']."' style='height:220px; width:220px'>";
					}
					else echo "----No Image Uploaded----";
					echo "
					</td>
				</tr>
				<tr>
					<td>User Id:</td>
					<td>".$_COOKIE['tempuserid']."</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>".$_COOKIE['temppassword']."</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>".stripslashes($_COOKIE['tempname'])."</td>
				</tr>
				<tr>
					<td>D.O.B:</td>
					<td>".$_COOKIE['tempdob']."</td>
				</tr>
				<tr>
					<td>Sex:</td>
					<td>".$_COOKIE['tempgend']."</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>".$_COOKIE['tempemail']."</td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td>".$_COOKIE['tempphone']."</td>
				</tr>
				<tr>
					<td>Address:</td>
					<td>".$_COOKIE['tempaddr']."</td>
				</tr>
				<tr>
					<td>Institution:</td>
					<td>".stripslashes($_COOKIE['tempinstitute'])."</td>
				</tr>
				<tr>
					<td>Course:</td>
					<td>".$_COOKIE['tempcourse']."</td>
				</tr>
				<tr>
					<td>Trade:</td>
					<td>".$_COOKIE['temptrade']."</td>
				</tr>
				<tr>
					<td>Syllabus:</td>
					<td>".$_COOKIE['tempsyllabus']."</td>";
					unset($_COOKIE['tempuserid']);
					unset($_COOKIE['tempmessage']);
					unset($_COOKIE['tempname']);
					unset($_COOKIE['temppassword']);
					unset($_COOKIE['tempdob']);
					unset($_COOKIE['tempgend']);
					unset($_COOKIE['tempemail']);
					unset($_COOKIE['tempphone']);
					unset($_COOKIE['tempaddr']);
					unset($_COOKIE['tempinstitute']);
					unset($_COOKIE['imgid']);
					unset($_COOKIE['tempcourse']);
					unset($_COOKIE['temptrade']);
					unset($_COOKIE['tempsyllabus']);
			}

			else if($_COOKIE['tempmessage']=="Student Detail Updated!")
			{
				echo"
			<h3>".$_COOKIE['tempmessage']."</h3>
			<div class='checkmark'></div>
			<table class='tbl'>
				<tr>
					<td>Image Id:</td>
					<td>";
					if($_COOKIE['imgid']!= "noimgid")
					{	
						echo "<img src='resources/uploads/imgid/".$_COOKIE['imgid']."' style='height:220px; width:220px'>";
					}
					else echo "----No Image Uploaded----";
					echo "
					</td>
				</tr>
				<tr>
					<td>User Id:</td>
					<td>".$_COOKIE['tempuserid']."</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>".stripslashes($_COOKIE['tempname'])."</td>
				</tr>
				<tr>
					<td>D.O.B:</td>
					<td>".$_COOKIE['tempdob']."</td>
				</tr>
				<tr>
					<td>Sex:</td>
					<td>".$_COOKIE['tempgend']."</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>".$_COOKIE['tempemail']."</td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td>".$_COOKIE['tempphone']."</td>
				</tr>
				<tr>
					<td>Address:</td>
					<td>".stripslashes($_COOKIE['tempaddr'])."</td>
				</tr>
				<tr>
					<td>Institution:</td>
					<td>".stripslashes($_COOKIE['tempinstitute'])."</td>
				</tr>";
					unset($_COOKIE['tempuserid']);
					unset($_COOKIE['tempmessage']);
					unset($_COOKIE['tempname']);
					unset($_COOKIE['tempdob']);
					unset($_COOKIE['tempgend']);
					unset($_COOKIE['tempemail']);
					unset($_COOKIE['tempphone']);
					unset($_COOKIE['tempaddr']);
					unset($_COOKIE['tempinstitute']);
					unset($_COOKIE['imgid']);
				
			}

			elseif($_COOKIE['tempmessage']=="Content Creator Detail Entered!")
			{
				echo("
			<h3>".$_COOKIE['tempmessage']."</h3>
			<div class='checkmark'></div>
			<table class='tbl'>
				<tr>
					<td>User Id:</td>
					<td>".$_COOKIE['tempuserid']."</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>".$_COOKIE['temppassword']."</td>
				</tr>
				<tr>
					<td>Name:</td>
					<td>".stripslashes($_COOKIE['tempname'])."</td>
				</tr>
				<tr>
					<td>Sex:</td>
					<td>".$_COOKIE['tempgend']."</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>".$_COOKIE['tempemail']."</td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td>".$_COOKIE['tempphone']."</td>
				</tr>");
					unset($_COOKIE['tempuserid']);
					unset($_COOKIE['tempmessage']);
					unset($_COOKIE['tempname']);
					unset($_COOKIE['temppassword']);
					unset($_COOKIE['tempemail']);
					unset($_COOKIE['tempphone']);
					unset($_COOKIE['tempgend']);
			}


			elseif($_COOKIE['tempmessage']=="Student Detail Deleted!")
			{
				echo("
			<h3>".$_COOKIE['tempmessage']."</h3>
			<div class='checkmark' style='top: -61px;left: -256px;' ></div>
			<table class='tbl'>
				<tr>
					<td>User Id:</td>
					<td>".$_COOKIE['tempuserid']."</td>
				</tr>");
					unset($_COOKIE['tempuserid']);
					unset($_COOKIE['tempmessage']);
			}
			
			
			elseif($_COOKIE['tempmessage']=="Content creator removed!")
			{
				echo("
			<h3>".$_COOKIE['tempmessage']."</h3>
			<div class='checkmark' style='top: -61px;left: -256px;' ></div>
			<table class='tbl'>
				<tr>
					<td>User Id:</td>
					<td>".$_COOKIE['tempuserid']."</td>
				</tr>");
					unset($_COOKIE['tempuserid']);
					unset($_COOKIE['tempmessage']);
			}



			elseif($_COOKIE['tempmessage']=="Question Updated!")
			{
				echo("
			<h3>".$_COOKIE['tempmessage']."</h3>
			<div class='checkmark' style='top: -61px;left: -256px;' ></div>
			<table class='tbl'>
				<tr>
					<td>Question paper Id:</td>
					<td>".$_COOKIE['tempqpid']."</td>
				</tr>");
					unset($_COOKIE['tempqpid']);
					unset($_COOKIE['tempmessage']);
			}

			?>
				</tr>
			</table>
			
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>