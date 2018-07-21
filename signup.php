<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<link href="/ipm/css/signup.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/ipm/js/html5.image.preview.js"></script>
<script type="text/javascript" src="/ipm/js/signup.js"></script>
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
			<div id="signupform">
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Register Student</h3>
					<form name="signup" onsubmit="return validateForm();" action="backend/signup.php" method="post" enctype="multipart/form-data">
						<table id="signup_tble">
							<tr>
								<td>First Name</td>
								<td>Last Name</td>
							</tr>
							<tr>
								<td><input type="text" name="fname" value="" spellcheck="false"  /></td>
								<td><input type="text" name="lname" value="" spellcheck="false" /></td>
							</tr>
							<tr>
								<td>D.O.B</td>
								<td><input type="date" name="dob" value="" /></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><input type="text" name="phone" value="" autocomplete="of"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="email" name="email" value="" spellcheck="false" autocomplete="off" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password" value="" spellcheck="false" autocomplete="off" /></td>
							</tr>
							<tr>
								<td>Sex </td><td>Female<input type="radio" name="gend" value="f" />
									 Male<input type="radio" name="gend" value="m" /></td>
							</tr>
							<tr>
							  <td>Address</td>
							  <td><textarea name="addr" cols="30" rows="5" id="address" spellcheck="false" class="bgnone"></textarea>
							  </td>
							</tr>
							<tr>
								<td>Name of Institution</td>
								<td><input name="institute" type="text" size="35" value=""></td>
							</tr>
							<tr>
								<td>Course</td>
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
							</tr>
							<tr>
								<td>Trade</td>
								<td>
									<select name="trade" id="trade" onchange="fetch_syllabus()">
									<option disabled selected value> -- Select Trade -- </option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Syllabus</td>
								<td>
									<select name="syllabus" id="syllabus">
									<option disabled selected value> -- Select Syllabus -- </option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" name="submit" value="Submit" class="submit" /></center></td>
							</tr>
						</table>
						<div id="propicupload">  
							<input type="file" name="imgfile" onchange="previewImage(this,[220],20);" /><br><br>
							<div style="height:220px; width:220px" class="imagePreview"></div>
						</div>
					</form>  
				</font> 
			</div>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>