<?php	
	include ('mysqli_plug.php');
	$qpid = $_POST['qpid'];
	$qpname = mysqli_real_escape_string($db, $_POST['qpname']);
	$noq = mysqli_real_escape_string($db, $_POST['noq']);
	$dur = mysqli_real_escape_string($db, $_POST['dur']);

	$query = "UPDATE `ipm`.`qpbank` SET `qpname` = '$qpname' , `noqs` = '$noq' , `dur` = '$dur' WHERE `qpbank`.`qpid` = '$qpid';";
	$result=mysqli_query($db,$query);

	if($result)
	{
		echo "QP details updated";
	}	
	else
	{
		echo "QP details updation failed!";
		echo "invalid query: ".mysqli_error();
	}
	
?>