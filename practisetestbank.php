<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>

	<script>

		function editrandom(active)
		{
			
			var status = active.value;
			var course = active.parentNode.parentNode.getElementsByTagName('td')[0].innerHTML;
			var trade = active.parentNode.parentNode.getElementsByTagName('td')[1].innerHTML;
			var syllabus = active.parentNode.parentNode.getElementsByTagName('td')[2].innerHTML;
			var nosubject = active.parentNode.parentNode.getElementsByTagName('td')[3].innerHTML;
			var noq = active.parentNode.parentNode.getElementsByTagName('td')[4].innerHTML;
			var duration = active.parentNode.parentNode.getElementsByTagName('td')[5].innerHTML;
			
			document.forms["randomSelect"]["status"].value=status;
		    document.forms["randomSelect"]["course"].value=course;
		    document.forms["randomSelect"]["trade"].value=trade;
			document.forms["randomSelect"]["syllabus"].value=syllabus;
			document.forms["randomSelect"]["nosubject"].value=nosubject;
		    document.forms["randomSelect"]["noq"].value=noq;
			document.forms["randomSelect"]["duration"].value=duration;
		    document.forms["randomSelect"].submit();
		}
	
	</script>
	
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
				$query="SELECT * from `ipm`.`practise_test`;";
				$result=mysqli_query($db,$query);
			?>
			<h3>Practise Test Question Settings</h3>
			<table class="tbl">
			<tr class="tbl_head">
				<td>Course</td>
				<td>Trade</td>
				<td>Syllabus</td>
				<td>NO: Subject</td>
				<td>No Of Questions</td>
				<td>Duration</td>
				<td>Status</td>
			</tr>
			<?php
			$rows=0;
			if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					while($temp=mysqli_fetch_array($result))
					{
						echo "<tr><td>".$temp['course']."</td>";
						echo "<td>".$temp['trade']."</td>";
						echo "<td>".$temp['syllabus']."</td>";
						echo "<td>".$temp['nosubject']."</td>";
						echo "<td>".$temp['noq']."</td>";
						echo "<td>".$temp['duration']."mins</td>";
						
						
						if($temp['status']==0)
						echo "<td><font color='#C90104' face='Tahoma, Geneva, sans-serif'>&#9673;</font><button name='test' class='button smallbtn' type='button' value='1' onclick='editrandom(this)'><font color='#008000' face='Tahoma, Geneva, sans-serif'>Activate</font></button></td>";
						
						if($temp['status']==1)
						echo "<td><font color='#008000' face='Tahoma, Geneva, sans-serif'>&#9673;</font><button name='test' class='button smallbtn' type='button' value='0' onclick='editrandom(this)'><font color='#C90104' face='Tahoma, Geneva, sans-serif'>Deactivate</font></button></td>";
					}
				}
				else echo"<tr><td colspan='6'>No records found</td></tr>";
			?>
			</table>
			<form name="randomSelect" method="post" action="backend/changestatuspractisetest.php">
				<input type="hidden" name="status" value="0" />
				<input type="hidden" name="course" value="0" />
				<input type="hidden" name="trade" value="0" />
				<input type="hidden" name="syllabus" value="0" />
				<input type="hidden" name="nosubject" value="0" />
				<input type="hidden" name="noq" value="0" />
				<input type="hidden" name="duration" value="0" />
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