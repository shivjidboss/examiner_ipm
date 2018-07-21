<?php

include ('mysqli_plug.php');

$course = $_POST["course"];
$course = mysqli_real_escape_string($db, $course);

$trade = $_POST["trade"];
$trade = mysqli_real_escape_string($db, $trade);


$syllabus = $_POST["syllabus"];
$syllabus = mysqli_real_escape_string($db, $syllabus);

$byrank = $_POST["byrank"];
$opt=0;
if($course!="")$opt = 1;
if($trade!="")$opt = 2;
if($syllabus!="")$opt = 3;

$colspan = 2+$_POST['pwd']+$_POST['institute']+$_POST['sex']+$_POST['dob']+$_POST['email']+$_POST['phone']+$_POST['addr']+$_POST['crs']+$_POST['trd']+$_POST['syl']+$_POST['imgid'];


if($opt==1)
	$query="SELECT * FROM `user_det` WHERE `course` = '$course'";
if($opt==2)
	$query="SELECT * FROM `user_det` WHERE `course` = '$course' AND `trade` = '$trade'";
if($opt==3)
	$query="SELECT * FROM `user_det` WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus'";

if($byrank==1)
	$query = $query." ORDER BY `mark`/`totalqp` DESC;";
else
	$query = $query." ORDER BY `username` ASC;";

$result=mysqli_query($db,$query);

//echo($result);

if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			echo("<a href='javascript:window.print()'><img src='resources/click-here-to-print.jpg' alt='print this page' id='print-button' /></a><center><table class='tbl'>");
			if($opt==1)echo("<tr class='tbl_hdcntr'><td colspan='".$colspan."'>".$course."</td></tr>");
			if($opt==2)echo("<tr class='tbl_hdcntr'><td colspan='".$colspan."'>".$course." > ".$trade."</td></tr>");
			if($opt==3)echo("<tr class='tbl_hdcntr'><td colspan='".$colspan."'>".$course." > ".$trade." > ".$syllabus."</td></tr>");
			
			echo "<tr class='tbl_head'>";
			echo "<td>UserId</td>";
			echo "<td>Name</td>";
			if($_POST['pwd']==1) echo "<td>Password</td>";
			if($_POST['sex']==1) echo "<td>Sex</td>";
			if($_POST['dob']==1) echo "<td>DOB</td>";
			if($_POST['email']==1) echo "<td>Email</td>";
			if($_POST['phone']==1) echo "<td>Phone</td>";
			if($_POST['addr']==1) echo "<td>Address</td>";
			if($_POST['institute']==1) echo "<td>Institute</td>";
			if($_POST['crs']==1) echo "<td>Course</td>";
			if($_POST['trd']==1) echo "<td>Trade</td>";
			if($_POST['syl']==1) echo "<td>Sylabus</td>";
			if($_POST['imgid']==1) echo "<td>PicID</td>";
			
			//echo("<tr class='tbl_head'><td>UserId</td><td>Name</td><td>Sex</td><td>DOB</td><td>Email</td>");
			//echo("<td>Phone</td><td>Address</td><td>Course</td><td>Trade</td><td>Sylabus</td></tr>");
			$round =0;
			while($temp=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td class='hyper' onclick='vwprof(this)'>".$temp['username']."</td>";
				echo "<td>".$temp['name']."</td>";
				if($_POST['pwd']==1) echo "<td>".$temp['password']."</td>";
				if($_POST['sex']==1) echo "<td>".$temp['sex']."</td>";
				if($_POST['dob']==1) echo "<td>".$temp['dob']."</td>";
				if($_POST['email']==1) echo "<td>".$temp['email']."</td>";
				if($_POST['phone']==1) echo "<td>".$temp['phone']."</td>";
				if($_POST['addr']==1) echo "<td>".$temp['addr']."</td>";
				if($_POST['institute']==1) echo "<td>".$temp['institute']."</td>";
				if($_POST['crs']==1) echo "<td>".$temp['course']."</td>";
				if($_POST['trd']==1) echo "<td>".$temp['trade']."</td>";
				if($_POST['syl']==1) echo "<td>".$temp['syllabus']."</td>";
				if($_POST['imgid']==1) 
				{
					if($temp['imgid']!='noimgid')
						echo "<td><img src='/ipm/resources/uploads/imgid/" . $temp['imgid'] ."' style='height:50px; width:50px'></td>";
					else
					{
						if($temp['sex']=='m')
							echo "<td><img src='/ipm/resources/male.png' style='height:50px; width:50px'></td>";
						if($temp['sex']=='f')
							echo "<td><img src='/ipm/resources/female.png' style='height:50px; width:50px'></td>";
					}
					
				}	
				echo "</tr>";
				
				
				
				
				//echo("<tr><td>".$temp['username']."</td><td>".$temp['name']."</td><td>".$temp['sex']."</td><td>".$temp['dob']."</td><td>".$temp['email']."</td>");
				//echo("<td>".$temp['phone']."</td><td>".$temp['addr']."</td><td>".$temp['course']."</td><td>".$temp['trade']."</td><td>".$temp['syllabus']."</td></tr>");
			}
			
			echo("</table></center>");
		}
		else echo "<tr><td><h2>No records found!</h2></td></tr></table>";
	}
		
else
{
	die('failed'.mysqli_error());
}