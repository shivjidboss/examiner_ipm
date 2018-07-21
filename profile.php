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
						echo ("USERID: ".$_SESSION['userid']);
					else	
						header("Location:welcome.php");
					echo "<br><br>Name: ".$_COOKIE['name'];
					echo("<a class='button logout' href='logout.php'>Logout</a>");
				?>
		
		<div class="gendicon <?php echo (($_COOKIE['sex']=='m')? 'male' : 'female'); ?>">
			<?php if($_COOKIE['imgid'] != "noimgid")
				{
					echo "<img src='/ipm/resources/uploads/imgid/" . $_COOKIE['imgid'] ."' style='height:100px; width:100px'>"; 
				}
			?>
		</div>
		</div>
	</div>	
</div>
<div id="main">
	<div id= 'notification' class="cusscroll" >
	 <?php
		include("shownotification.php");
	?>	
	</div>
	<?php	include("backend/profileresultfecther.php");  ?>
	<div id="leftpane">
		<div id="mini_prof">
			<a class="sdbarlinks" href="profile.php"> Home Page</a><br>
			<a class="sdbarlinks" href="subjectselect.php">Take Test</a><br>
			<a class="sdbarlinks" href="profilerankindex.php">Rank</a>
			<a class="sdbarlinks" href="logout.php">Logout</a><br>
		</div>
	</div>
	<div id="surface">
		<div id="body_card" style=" width: 653px">
			<h3>Profile</h3>
			<table class="tbl">
			<tr>
				<td>UserId:</td>
				<td><?php echo($_COOKIE['userid']);?></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><?php echo($_SESSION['name']);?></td>
			</tr>	
			<tr>
				<td>Date Of Birth:</td>
				<td><?php echo($_COOKIE['dob']);?></td>
			</tr>	
			<tr>
				<td>Email:</td>
				<td><?php echo($_COOKIE['email']);?></td>
			</tr>	
			<tr>
				<td>Phone:</td>
				<td><?php echo($_COOKIE['phone']); ?></td>
			</tr>	
			<tr>
				<td>Course:</td>
				<td><?php echo($_SESSION['course']); ?></td>
			</tr>	
			<tr>
				<td>Trade:</td>
				<td><?php echo($_SESSION['trade']); ?></td>
			</tr>	
			<tr>
				<td>Syllabus:</td>
				<td><?php echo($_SESSION['syllabus']); ?></td>
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
			   include ('backend/mysqli_plug.php');
			   $course = $_SESSION['course'];
			   $trade = $_SESSION['trade'];
			   $syllabus = $_SESSION['syllabus'];
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
							if($temp['username']==$_COOKIE['userid'])
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