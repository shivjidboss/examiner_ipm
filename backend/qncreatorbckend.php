<?php

//--------------dbversion

$pset=1;
include ('mysqli_plug.php');
if(!isset($_POST['qntype']))$pset=0;
else
{
	if($_POST['qntype']=="NUM")
		$variables = array('qpid', 'qn', 'op1', 'ans', 'mrk', 'negmrk', 'course', 'trade', 'syllabus', 'subject');
	else
		$variables = array('qpid', 'qn', 'op1', 'op2', 'op3', 'op4', 'ans', 'mrk', 'negmrk', 'course', 'trade', 'syllabus', 'subject');
	foreach($variables as $variable_name)
		{
			if(!isset($_POST[$variable_name]) && empty($_POST[$variable_name]))
				{
					$pset=0;
				}
		}
}

if($pset==1)
	{
		$query = "SELECT MAX(`qnid`) AS qnid FROM `ipm`.`qnsbank`;";
		$result=mysqli_query($db,$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if($result['qnid']=='')
		 $qnid = "qn0000000001";
		else 
		 $qnid = ++$result['qnid'];
		
		$qpid = $_POST['qpid'];
		$qntype = $_POST['qntype'];
		$course = $_POST['course'];
		$trade = $_POST['trade'];
		$syllabus = $_POST['syllabus'];
		$subject = $_POST['subject'];
		
		
		$qntxt = mysqli_real_escape_string($db, rawurldecode($_POST['qn']));
		$op1 = mysqli_real_escape_string($db, rawurldecode($_POST['op1']));
		$op2 = mysqli_real_escape_string($db, rawurldecode($_POST['op2']));
		$op3 = mysqli_real_escape_string($db, rawurldecode($_POST['op3']));
		$op4 = mysqli_real_escape_string($db, rawurldecode($_POST['op4']));
		$ans = $_POST['ans'];
		if($_POST['qntype']=="NUM"){$ans=$op1;$op1=$op2;}
		$mark = mysqli_real_escape_string($db, $_POST['mrk']);
		$negmark = mysqli_real_escape_string($db, $_POST['negmrk']);
		//$fullans = $_POST['fullans'];
		$fullans = 'notworkedout';
		
		$query="INSERT INTO `ipm`.`qnsbank` (qnid, qpid, qntype, qntxt, op1, op2, op3, op4, ans, mark, negmark, fullans, course, trade, syllabus, subject) VALUES ('$qnid', '$qpid', '$qntype', '$qntxt', '$op1', '$op2', '$op3', '$op4', '$ans', '$mark', '$negmark', '$fullans', '$course', '$trade','$syllabus', '$subject');";
		$result=mysqli_query($db,$query);
		if($result)
		{
			echo "Insertion successfull"; 
		}	
		
		else
		{
			echo "Question entry failed!";
			echo mysqli_errno() . ": " . mysqli_error() . "\n";
		}
	}

else
	{
		header("Location:../php_test.php");
	}
?>