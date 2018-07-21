<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 

<script type="text/javascript">

	function fetch_subject()
	 {
		 var subject = document.getElementById('subject').value;
		 document.cookie = "subject="+subject;
		 window.location.href = "qpbank.php";
	 }
	function takepractisetest()
	{
		document.forms["qpselect"].submit();
	}
	
</script>

<?php
	session_start();
	unset($_COOKIE['subject']);
?>	
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
	<div id="leftpane">
		<div id="mini_prof">
			<a class="sdbarlinks" href="profile.php"> Home Page</a><br>
			<a class="sdbarlinks" href="subjectselect.php">Take Test</a><br>
			<a class="sdbarlinks" href="logout.php">Logout</a><br>
		</div>
	</div>
	<div id="surface">
		<div id="body_card">
			
			<h3>Take Test</h3>
			<?php

			include('backend/mysqli_plug.php');
			//Count total number of rows
			$query = $db->query("SELECT * FROM subject where course = '".$_SESSION['course']."' AND trade = '".$_SESSION['trade']."' AND syllabus = '".$_SESSION['syllabus']."';");
			//Count total number of rows	
			$rowCount = $query->num_rows;
			?>
			Select a subject:
			<select id="subject" onchange="fetch_subject()">
				<option disabled selected value> -- Select Subject -- </option>
				<?php
				if($rowCount > 0)
				{
					while($row = $query->fetch_assoc())
					{ 
						echo '<option value="'.$row['subject'].'">'.$row['subject'].'</option>';
					}
				}
				else
				{
					echo '<option value="nope">Subject not available</option>';
				}
				?>
			</select>
			<br><br>
			<hr>
			<?php
				
				$course = $_COOKIE['course'];
				$trade = $_COOKIE['trade'];
				$syllabus = $_COOKIE['syllabus'];
					
				
				$query = "SELECT * FROM `ipm`.`practise_test` WHERE `course`= '$course' AND `trade`= '$trade' AND  `syllabus`= '$syllabus' AND `status` = '1';";
				$result = mysqli_query($db,$query);
				if(mysqli_num_rows($result)>0)
				{
					$temp = mysqli_fetch_array($result,MYSQLI_ASSOC);
					echo "<center>OR<br><br><input type='button' class='button medbtn' value='Take a Practise Test!' onClick='takepractisetest();' /></center>";
					echo "
					<form name='qpselect' method='post' action='qnaireui.php'>
						<input type='hidden' name='qpid' value='' />
						<input type='hidden' name='noq' value='".$temp['noq']*$temp['noq']."' />
						<input type='hidden' name='dur' value='".$temp['duration']."' />
						<input type='hidden' name='rand' value='2' />
					</form>
					";
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