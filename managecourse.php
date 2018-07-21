<!doctype html>
<html>
<?php session_start(); ?>	
<head>
<meta charset="utf-8">
<title>IPM Academy - Add Courses</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<script src="/ipm/js/managecourse.js"></script>
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
				include('backend/mysqli_plug.php');
				$query = $db->query("SELECT * FROM course");
				$rowCount = $query->num_rows;
			?>
			<div id="managecoursecntrl">
			<h2>Manage Course</h2>
				<form name="managecourse">
				<table id="managecourse">
				<colgroup>
					<col />
					<col />
					<col />
					<col /></colgroup>

					<tr>
						<td>
						   <select id="course" size="12" onchange="fetch_trade()" class="course_window">
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
								//echo '<option value="addcourse">Add new course</option>';
								?>
							</select>
						</td>
						<td>
							<select id="trade" size="12" onchange="fetch_syllabus()" class="course_window">
								<option disabled selected value> -- Select Trade -- </option>
							</select>
						</td>
						<td>
							<select id="syllabus" size="12" onchange="fetch_subject()" class="course_window">
								<option disabled selected value> -- Select Syllabus -- </option>
							</select>
						</td>
						<td>
							<select id="subject" size="12" class="course_window">
								<option disabled selected value> -- Select Subject -- </option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="text" id="courseinpt" size="23" /></td>
						<td><input type="text" id="tradeinpt" size="23" /></td>
						<td><input type="text" id="syllabusinpt" size="23" /></td>
						<td><input type="text" id="subjectinpt" size="23" /></td>
					</tr>
					<tr id="buttonsrow">
						<td><button type="button" name="addcourse" onClick="addcoursedetls(1);" class="button medbtn">+ Add Course</button></td>
						<td><button type="button" name="addtrade" onClick="addcoursedetls(2);" class="button medbtn">+ Add Trade</button></td>
						<td><button type="button" name="addsyllabus" onClick="addcoursedetls(3);" class="button medbtn">+ Add Syllabus</button></td>
						<td><button type="button" name="addsubject" onClick="addcoursedetls(4);" class="button medbtn">+ Add Subject</button></td>
					</tr>
				</table>

				</form>
			</div>
		</div>
	</div>
	<div id="rightpane">
		
	</div>
</div>
</body>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</html>