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
<script src="/ipm/js/rankindex.js"></script>

<script>
function fetch_course()
{
var usr;
//var course=document.forms.managecourse.course.value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  usr=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  usr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
usr.onreadystatechange=function ()
  {
  if (usr.readyState==4 && usr.status==200)
    {
    document.getElementById("course").innerHTML=usr.responseText;
	fetch_trade(1);
	fetch_syllabus(1);
	fetch_subject(1);
	}
  }
  
usr.open("POST","backend/managecourseajax.php",true);
usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
usr.send();
}	
	
function fetch_trade(t)
{
	if(t==1)
	{
		document.getElementById("trade").innerHTML="<option disabled selected value> -- Select Trade -- </option>";
		return;
	}
	var usr;
	var course=document.forms.randomsetting.course.value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  usr=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  usr=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	usr.onreadystatechange=function ()
	  {
	  if (usr.readyState==4 && usr.status==200)
		{
		document.getElementById("trade").innerHTML=usr.responseText;
		fetch_syllabus(1);
		fetch_subject(1);
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send("course="+course);
}
	
function fetch_syllabus(t)
{
	if(t==1)
	{
		document.getElementById("syllabus").innerHTML="<option disabled selected value> -- Select Syllabus -- </option>";
		return;
	}
	var usr;
	var course= document.forms.randomsetting.course.value;
	var trade=document.forms.randomsetting.trade.value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  usr=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  usr=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	usr.onreadystatechange=function ()
	  {
	  if (usr.readyState==4 && usr.status==200)
		{
		document.getElementById("syllabus").innerHTML=usr.responseText;
		fetch_subject(1);
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course);

}

function fetch_subject(t)
{
	if(t==1)
	{
		document.getElementById("subject").innerHTML="<option disabled selected value> -- Select Subject -- </option>";
		return;
	}
	var usr;
	var course= document.forms.randomsetting.course.value;
	var trade=document.forms.randomsetting.trade.value;
	var syllabus=document.forms.randomsetting.syllabus.value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  usr=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  usr=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	usr.onreadystatechange=function ()
	  {
	  if (usr.readyState==4 && usr.status==200)
		{
		document.getElementById("subject").innerHTML=usr.responseText;
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course+"& syllabus="+syllabus);

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
			<div>
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Random Question Setting</h3>
					<form name="randomsetting"action="backend/randomsettingbackend.php" method="post" enctype="multipart/form-data" >
						<table id="signup_tble">
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
									<select name="syllabus" id="syllabus" onChange="fetch_subject()">
									<option disabled selected value> -- Select Syllabus -- </option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Subject</td>
								<td>
									<select name="subject" id="subject">
									<option disabled selected value> -- Select Subject -- </option>
									</select> 
								</td>
							</tr>
							<tr>
								<td>No Of Questions</td>
								<td><input type="text" name="noq" id="nop"></td>
							</tr>
							<tr>
								<td>Duration</td>
								<td><input type="text" name="duration" id="duration">mins</td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" name="submit" value="Set Settings" class="submit" /></center></td>
							</tr>
						</table>
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