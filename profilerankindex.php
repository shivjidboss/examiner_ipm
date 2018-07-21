<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>


<link href="/ipm/css/bargraph.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/profilerankindex.js"></script>
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
	
	<?php
			include ('backend/mysqli_plug.php');
	  $course = $_SESSION['course'];
	  $trade = $_SESSION['trade'];
	  $syllabus = $_SESSION['syllabus'];
			$query="SELECT * FROM `user_det` WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' ORDER BY `mark`/`totalqp` DESC ";
			$result=mysqli_query($db,$query);
				
		?>
	
	
		<div id="body_card">
		<font color="#333333" face="Tahoma, Geneva, sans-serif"><h2>Rank List</h2>
			<?php 
				
			echo "<div id='qpdetails'><table><tbody><tr><td>".$course."</td><td> &gt;</td><td>".$trade."</td><td>&gt;</td><td>".$syllabus."</td></tbody></table></div><br>";
			
			
			$rows=0;
			if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					$round=0;
					while($temp=mysqli_fetch_array($result))
					{
						if($round<3)
						{
							if($temp['username']==$_SESSION['userid'])
								$tname[]="You!";
							else
							$tname[] = $temp['name'];
							$timg[] = $temp['imgid'];
							//echo ".$temp['name'].";
							//echo "<img src='/ipm/resources/uploads/imgid/" . $temp['imgid'] ."' style='height:100px; width:100px'>";
						}
						$round++;
					 }
				}
			
			
			echo "<div style='overflow: hidden;'><table class='podium'><tr>";
				for($i=0;$i<3;$i++)
				{
					if(isset($timg[$i]))
					{
						if($timg[$i]=="noimgid")
							echo "<td><center><img src='/ipm/resources/uploads/imgid/default.jpg' style='height:100px; width:100px'><div class='rank".($i+1)."'></div></center></td>";
						else
							echo "<td><center><img src='/ipm/resources/uploads/imgid/" . $timg[$i] ."' style='height:100px; width:100px'><div class='rank".($i+1)."'></div></center></td>";
					}
					else
							echo "<td><center><img src='/ipm/resources/uploads/imgid/default.jpg' style='height:100px; width:100px'><div class='rank".($i+1)."'></div></center></td>";
				}
			echo "</tr><tr>";
				for($i=0;$i<3;$i++)
				{  if(isset($tname[$i])) echo "<td><center>".$tname[$i]."</center></td>"; else echo "<td><center>-Nil-</center></td>"; }
			echo "</tr></table><div id='spotlightcntnr'><div class='spotlight'></div><div class='spotlight'></div></div></div>";
			$query="SELECT * FROM `user_det` WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' ORDER BY `mark`/`totalqp` DESC ";
			$result=mysqli_query($db,$query);
			
			
			?></h5><br><br>
			<table class="tbl" style="width: 100%;">
			<tr class="tbl_head">
				<td>Rank</td>
				<td>Id</td>
				<td>Name</td>
				<td>Total Questions Papers</td>
				<td>Mark</td>
			</tr>
			<?php
			$rows=0;
			$round =0;
			if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					while($temp=mysqli_fetch_array($result))
					{
						echo "<tr><td><center>".++$round."</center></td>";
						echo "<td><center>".$temp['username']."</center></td>";
						echo "<td><center>".$temp['name']."</center></td>";
						echo "<td><center>".$temp['totalqp']."</center></td>";
						if($temp['totalqp']!=0)
							echo "<td><center>".$temp['mark']/$temp['totalqp']."</center></td>";
						else
							echo "<td><center>0</center></td>";
					 }
				}
				else echo"<tr><td colspan='5'>Rank List Not available</td></tr>";
			?>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>