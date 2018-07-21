<?php
include ('mysqli_plug.php');


$query="SELECT * from `ipm`.`qpbank` ";
if(isset($_POST['course'])&& !empty($_POST['course']))
{
	$query="SELECT * from `ipm`.`qpbank`  WHERE course = '".$_POST['course']."';";
	if(isset($_POST["trade"]) && !empty($_POST["trade"]))
	{
		$query="SELECT * from `ipm`.`qpbank` WHERE course = '".$_POST['course']."' AND trade = '".$_POST['trade']."';";
		if(isset($_POST["syllabus"]) && !empty($_POST["syllabus"]))
		{
			$query="SELECT * from `ipm`.`qpbank` WHERE course = '".$_POST['course']."' AND trade = '".$_POST['trade']."' AND syllabus = '".$_POST['syllabus']."';";
			if(isset($_POST["subject"]) && !empty($_POST["subject"]))
			{
				$query="SELECT * from `ipm`.`qpbank` WHERE course = '".$_POST['course']."' AND trade = '".$_POST['trade']."' AND syllabus = '".$_POST['syllabus']."' AND subject = '".$_POST['subject']."';";
			}
		}
	}
}


$result=mysqli_query($db,$query);
if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					echo "
					<tr class='tbl_head'>
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
					</tr>";
					
					
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