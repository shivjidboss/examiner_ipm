<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<script src="/ipm/js/qnpcreator.js"></script>

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
			<div id="qnpcreatorcntnr">
				<h2>Create Question Paper</h2>
				<form name="qnpcreator" onsubmit="return validate_qnpcreator();" action="backend/qnpcreatorbckend.php" method="post">
					Name: <input type="text" name="qpname" /><br><br>
					No. of questions: <input type="text" name="noq" size="5" /><br><br>
					Duration: <input type="text" name="dur" size="5" />mins<br><br>
					Negative marking: <input type="checkbox" name="negate" value="1"/><br><br>
					<?php

					include('backend/mysqli_plug.php');
					
					//Count total number of rows
					$query = $db->query("SELECT * FROM course");

					//Count total number of rows	
					$rowCount = $query->num_rows;
					?>
					
					<select name="coursee" id="course" onchange="fetch_trade()">
						<option disabled selected value> -- Select Course -- </option>
						<?php
						if($rowCount > 0){
							while($row = $query->fetch_assoc()){ 
								echo '<option value="'.$row['course'].'">'.$row['course'].'</option>';
							}
						}else{
							echo '<option value="">Course not available</option>';
						}
						?>
					</select> <!-- drop down for course -->

					<select name="tradee"  id="trade" onchange="fetch_syllabus()">
						<option disabled selected value> -- Select Trade -- </option>
					</select> <!-- drop down for trade -->

					<select name="syllabuss" id="syllabus" onChange="fetch_subject()">
					  <option disabled selected value> -- Select Syllabus -- </option>
					</select> <!-- drop down for syllabus -->

					<select name="subjectt" id="subject">
					 <option disabled selected value> -- Select Subject -- </option>
					</select> <!-- drop down for subject -->
					<input class="button smallbtn" type="submit" value="+ Create" />
				</form>
			</div>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>