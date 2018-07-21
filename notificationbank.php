<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>

<script src="/ipm/js/notificationbank.js"></script>
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
				include ('backend/mysqli_plug.php');
				$query="SELECT * from `ipm`.`notification` ORDER BY 'id' DESC;";
				$result=mysqli_query($db,$query);
			?>
			<h3>Notification</h3>
			<table class="tbl">
			<tr class="tbl_head">
				<td>Id</td>
				<td>Subject</td>
				<td>Message</td>
				<td>Status</td>
				<td>Edit</td>
			</tr>
			<?php
			$rows=0;
			if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					while($temp=mysqli_fetch_array($result))
					{
						echo "<tr><td>".$temp['id']."</td>";
						echo "<td>".$temp['subject']."</td>";
						echo "<td>".$temp['message']."</td>";
						if($temp['enable']==1)
							echo "<td><font color='#2BF30C' face='Tahoma, Geneva, sans-serif'>Enabled</font></td>";
						else
							echo("<td><font color='#C90104' face='Tahoma, Geneva, sans-serif'>Disabled</font></td>");
						echo "<td><button class='button smallbtn' name='test' type='button' value='".$temp['id']."' onclick='editnotification(this)'>Edit</button>";
					}
				}
				else echo"<tr><td colspan='5'>No notifications available</td></tr>";
			?>
			</table>
			<table>
				<form name="addnew" action="addnotification.php">
				<tr>
					<td colspan="2"><center><button class='button smallbtn' type="submit" value="submit" name="submit">Add New</button></center></td>
				</tr>
				</form>	
			</table>
			<form name="notificationSelect" method="post" action="editnotification.php">
				<input type="hidden" name="id" value="0" />
			</form>
		</div>
	</div>
	<div id="rightpane">
		
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>