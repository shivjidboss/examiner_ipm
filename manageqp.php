<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<script src="/ipm/js/manageqp.js"></script>

<?php session_start(); ?>  
<script type="text/javascript">
	
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
	var course=document.forms.coursefilter.coursee.value;

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
	var course= document.forms.coursefilter.coursee.value;
	var trade=document.forms.coursefilter.tradee.value;

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
	var course= document.forms.coursefilter.coursee.value;
	var trade=document.forms.coursefilter.tradee.value;
	var syllabus=document.forms.coursefilter.syllabuss.value;

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

function filter()
{
	var usr;
	var course= document.forms.coursefilter.coursee.value;
	var trade=document.forms.coursefilter.tradee.value;
	var syllabus=document.forms.coursefilter.syllabuss.value;
	var subject=document.forms.coursefilter.subjectt.value;

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
			document.getElementsByClassName('tbl')[0].innerHTML=usr.responseText;
		}
	  }

	usr.open("POST","backend/qplister.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course+"& syllabus="+syllabus+"& subject="+subject);
}		
	
	
	

</script>
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
		<div id="body_card" style="width: auto;">
			<?php
				include ('backend/mysqli_plug.php');

				$query="SELECT * from `ipm`.`qpbank`";
				$result=mysqli_query($db,$query);
			?>
			<h3>Manage Question Papers</h3>
			
			<?php

					include('backend/mysqli_plug.php');
					
					//Count total number of rows
					$query = $db->query("SELECT * FROM course");

					//Count total number of rows	
					$rowCount = $query->num_rows;
					?>
					<form name="coursefilter">
					Filter: <select name="coursee" id="course" onchange="fetch_trade()">
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
					
					<input class="button smallbtn" type="button" onClick="filter()" value="Get" />
					</form>
			</br>
			</br>
			<table class="tbl">
			<tr class="tbl_head">
				<td>QP Id</td>
				<td>QP Name</td>
				<td>No. of qns</td>
				<td>Course</td>
				<td>Trade</td>
				<td>Syllabus</td>
				<td>Subject</td>
				<td>Duration</td>
				<td>-ve Mark</td>
				<td>View</td>
				<td>Change Status</td>
			</tr>
			<?php
			if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					while($temp=mysqli_fetch_array($result))
					{

						echo "<tr><td>".$temp['qpid']."</td>";
						echo "<td>".$temp['qpname']."</td>";
						echo "<td>".$temp['noqs']."</td>";
						echo "<td>".$temp['course']."</td>";
						echo "<td>".$temp['trade']."</td>";
						echo "<td>".$temp['syllabus']."</td>";
						echo "<td>".$temp['subject']."</td>";
						echo "<td>".$temp['dur']."</td>";
						if($temp['negate']==1)echo "<td>Yes</td>"; else echo "<td>No</td>";
						echo "<td><button name='test' class='button smallbtn' type='button' value='".$temp['qpid']."' onclick='updateqp(this)' >View</button></td>";
						
						if($temp['status']==0)
						echo "<td><font color='#C90104' face='Tahoma, Geneva, sans-serif'>&#9673;</font><button name='test' class='button smallbtn' type='button' value='".$temp['qpid']."' onclick='changestatus(this,1)'><font color='#008000' face='Tahoma, Geneva, sans-serif'>Activate</font></button></td>";
						
						if($temp['status']==1)
						echo "<td><font color='#008000' face='Tahoma, Geneva, sans-serif'>&#9673;</font><button name='test' class='button smallbtn' type='button' value='".$temp['qpid']."' onclick='changestatus(this,0)'><font color='#C90104' face='Tahoma, Geneva, sans-serif'>Deactivate</font></button></td>";


					}
				}
				else echo"<tr><td colspan='11'>No question papers available</td></tr>";
			?>
			</table>
		</div>
		<form name="qpselect" method="post" action="qpviewer.php">
			<input type="hidden" name="qpid" value="0" />
			<input type="hidden" name="noq" value="0" />
			<input type="hidden" name="course" value="0" />
			<input type="hidden" name="trade" value="0" />
			<input type="hidden" name="syllabus" value="0" />
			<input type="hidden" name="subject" value="0" />
		</form>
	</div>
</div>
</body>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</html>