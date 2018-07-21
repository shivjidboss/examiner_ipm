<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" media="screen, projection" />
<link rel="stylesheet" href="/ipm/css/printstudlist.css" type="text/css" media="print"/>

<script src="/ipm/js/bgprocess.js"></script>
<script src="/ipm/js/studentlist.js"></script>	

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
		<div id="body_card" style="width:auto;min-width: 1260px;">
			<div id="getlistform" style="margin-left: 180px;">
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Student List</h3>
					<form name="studentlist">
						<table id="signup_tble">
							<tr>
								<td>Course</td><td>Trade</td><td>Syllabus</td>
							</tr>
							<tr>
								<td>
									<?php
										include('backend/mysqli_plug.php');
										$query = $db->query("SELECT * FROM course");
										$rowCount = $query->num_rows;
									?>
									<select name="course"  id="course" onchange="fetch_trade()">
									<option disabled selected value> -- Select Course -- </option>
									<?php
									if($rowCount > 0)
									{
										while($row = $query->fetch_assoc())
										{ 
											echo '<option value="'.$row['course'].'">'.$row['course'].'</option>';
										}
									}
									else
									{
										echo '<option value="nope">Course not available</option>';
									}
									?>
									</select>
								</td>
								<td>
									<select name="trade" id="trade" onchange="fetch_syllabus()">
									<option disabled selected value> -- Select Trade -- </option>
									</select>
								</td>
								<td>
									<select name="syllabus" id="syllabus">
									<option disabled selected value> -- Select Syllabus -- </option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									[Course <input type="checkbox" name="crs" value="1" checked="checked" />]
									[Trade <input type="checkbox" name="trd" value="1" checked="checked" />]
									[Syllabus <input type="checkbox" name="syl" value="1" checked="checked" />]
									[Password <input type="checkbox" name="pwd" value="1" />]
									[Sex <input type="checkbox" name="sex" value="1" />]
									[DOB <input type="checkbox" name="dob" value="1" />]
									[Email <input type="checkbox" name="email" value="1" />]
									[Phone <input type="checkbox" name="phone" value="1" />]
									[Address <input type="checkbox" name="addr" value="1" />]
									[Institute <input type="checkbox" name="institute" value="1" />]
									[PicID <input type="checkbox" name="imgid" value="1" />]
								</td>
							</tr>
							<tr>
								<td colspan="3">Sort by rank? <input type="checkbox" name="byrank" value="1" /></td>
							</tr>
							<tr>
								<td colspan="3"><center><input type="button" name="submit" value="Get Student List" class="submit" onclick="getstudentlist();" /></center></td>
							</tr>
						</table>
					</form>  
				</font> 
			</div>
			<div id="studentlistbox">
				
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