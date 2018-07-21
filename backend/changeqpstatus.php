<?php
include ('mysqli_plug.php');


$qpid= $_POST['qpid'];
$status = $_POST['status'];
$goahead = 0;

//echo("qpid=".$qpid." Change Status to=".$status);

//if($_POST['status']==1)
{
	$query = "SELECT * FROM `ipm`.`qnsbank` WHERE qpid = '$qpid';";
	$result=mysqli_query($db,$query);
	$rows = mysqli_num_rows($result);
	if($rows != $_POST['noq'])$goahead = 1;
}


if($goahead==0)
{
	$query="UPDATE `ipm`.`qpbank` SET `status` = '$status' WHERE `qpbank`.`qpid` = '$qpid';";
	$result=mysqli_query($db,$query);

	if($result)
	{
		if($_POST['status']==1)
		{
			echo "<font color='#008000' face='Tahoma, Geneva, sans-serif'>&#9673;</font><button name='test' class='button smallbtn' type='button' value='".$_POST['qpid']."' onclick='changestatus(this,0)'><font color='#C90104' face='Tahoma, Geneva, sans-serif'>Deactivate</font></button>";
		}
		else if($_POST['status']==0)
		{
			echo "<font color='#C90104' face='Tahoma, Geneva, sans-serif'>&#9673;</font><button name='test' class='button smallbtn' type='button' value='".$_POST['qpid']."' onclick='changestatus(this,1)'><font color='#008000' face='Tahoma, Geneva, sans-serif'>Activate</font></button>";
		}
	}
	else
		echo("Not Successfull");
}
else
{
	echo "FilluptheQnPaper";
}
	
?>