<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<?php session_start();
include ('backend/mysqli_plug.php');
$uid=$_POST['uid'];
$query ="SELECT * FROM `user_det` WHERE `username` = '$uid'";
$result=mysqli_query($db,$query);
if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			$temp1=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$path=$temp1['course']."/".$temp1['trade']."/".$temp1['syllabus']."/".$uid.".xml";
		}
		else echo "Record not found!";
	}
		
else
{
	die('failed'.mysqli_error());
}


 ?>        
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
	 <?php include("shownotification.php");	?>	
	</div>
	<?php	include("backend/studprofilefetcther.php");  ?>
	<div id="leftpane">
		<?php include("adminsidebar.php");	?>
	</div>
	<div id="surface">
		<div id="body_card" style=" width: 653px">
			<h3>Profile</h3>
			<table class="tbl">
			<tr>
				<td>PhotoId:</td>
				<td>
					<div class="gendicon2 <?php echo (($temp1['sex']=='m')? 'male' : 'female'); ?>">
					<?php if($temp1['imgid'] != "noimgid")
						{
							echo "<img src='/ipm/resources/uploads/imgid/" . $temp1['imgid'] ."' style='height:200px; width:200px'>"; 
						}
					?>
					</div>
				</td>
			</tr>
			<tr>
				<td>UserId:</td>
				<td><?php echo($temp1['username']);?></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><?php echo($temp1['name']);?></td>
			</tr>	
			<tr>
				<td>Date Of Birth:</td>
				<td><?php echo($temp1['dob']);?></td>
			</tr>	
			<tr>
				<td>Email:</td>
				<td><?php echo($temp1['email']);?></td>
			</tr>	
			<tr>
				<td>Phone:</td>
				<td><?php echo($temp1['phone']); ?></td>
			</tr>	
			<tr>
				<td>Course:</td>
				<td><?php echo($temp1['course']); ?></td>
			</tr>	
			<tr>
				<td>Trade:</td>
				<td><?php echo($temp1['trade']); ?></td>
			</tr>	
			<tr>
				<td>Syllabus:</td>
				<td><?php echo($temp1['syllabus']); ?></td>
			</tr>	
			</table>




			<br>
			<?php

				echo("<h3>Performace Table</h3><table class='tbl'>
				<tr>
					<td>No: Of Question Papers Attended</td>
					<td>".$cnt."</td>
				</tr>
				<tr>
					<td>Total Number Correct Answers</td>
					<td>".$cummulativiecorrect."/".$cummulativienoq."</td>
				</tr>
				<tr>
					<td>Total Marks</td>
					<td>".$cummulativiemarks."/".$cummulativieqmarks."</td>
				</tr>
			</table>"); ?>

			<br><br><div id="bargraph">
			
			</div>	
			<script type="text/javascript" src="/ipm/js/jsapi.js"></script>
			<script type="text/javascript" src="/ipm/js/uds_api_contents.js"></script>
			<script>
			
				google.load('visualization', '1', {packages: ['corechart']});
				google.setOnLoadCallback(drawChart);
				
				
				function drawChart() {
				  var data = google.visualization.arrayToDataTable([
					["Test", "Mark"]
					 <?php
					  for($j=0;$j<$cnt;$j++)
						{
							echo ',["Test '.($j+1).'", '.($graphmarks[$j]).']';
						}
					 ?>
				  ]);

				  var view = new google.visualization.DataView(data);
				  

				  var options = {
					title: "Test wise mark scored"
				  };
				  var chart = new google.visualization.ColumnChart(document.getElementById("bargraph"));
				  chart.draw(view, options);
			  }
			</script>
			
			
			
			
		</div>
	</div>
	<div id="rightpane">
		<div id="perfpie">
			<div id="piechart">
					<script type="text/javascript" src="/ipm/js/jsapi.js"></script>
					<script type="text/javascript" src="/ipm/js/uds_api_contents.js"></script>
					<script type="text/javascript">
						google.load('visualization', '1', {packages: ['corechart']});
						// google.charts.load('current', {'packages':['corechart']});
						  google.setOnLoadCallback(drawChart);
						  function drawChart() {
							 var data = google.visualization.arrayToDataTable([
							  ['Attended', 'Number of Questions'],
							  ['Correct',     <?php echo $cummulativiecorrect; ?> ],
							  ['Incorrect',    <?php echo $cummulativietotal-$cummulativiecorrect; ?>  ]
							]);
							var options = {
							  title: 'Performance'
							};

							var chart = new google.visualization.PieChart(document.getElementById('piechart'));

							chart.draw(data, options);
							}
					</script>
			</div>
			<?php
			   
			   $course = $temp['course'];
			   $trade = $temp['trade'];
			   $syllabus = $temp['syllabus'];
			   $query="SELECT * FROM `user_det` WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' ORDER BY `mark`/`totalqp` DESC ";
			   $result=mysqli_query($db,$query);
			   
			   $rows=0;
				$round =0;
				if($result) $rows = mysqli_num_rows($result);
				if($rows !=0)
					{
						while($temp=mysqli_fetch_array($result))
						{
							++$round;
							if($temp['username']==$uid)
								echo "<p style='color: #ab2929;padding-left: 50px;'><span style='font-size: 45px;'>Rank:</span><span style='font-size: 60px;'>".$round."</span></p>";
						}
					}
			  
			?>		
					
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>