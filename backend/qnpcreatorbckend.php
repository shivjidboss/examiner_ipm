<?php

include ('mysqli_plug.php');
$pset=1;
$variables = array('qpname', 'noq', 'dur');
foreach($variables as $variable_name)
	{
		if(!isset($_POST[$variable_name]) && empty($_POST[$variable_name]))
		{
			$pset=0;
		}
	}
if($pset==1)
	{
		$qpname = mysqli_real_escape_string($db, $_POST['qpname']);
		$noq = mysqli_real_escape_string($db, $_POST['noq']);
		$dur = mysqli_real_escape_string($db, $_POST['dur']);
		if(isset($_POST['negate']))$negate=1;else $negate=0;
		$course = $_POST['coursee'];
		$trade = $_POST['tradee'];
		$syllabus = $_POST['syllabuss'];
		$subject = $_POST['subjectt'];
		$qpname = mysqli_real_escape_string($db, $qpname);
		$query = "SELECT MAX(`qpid`) AS qpid FROM `ipm`.`qpbank`;";
		$result = mysqli_query($db,$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$result = $result['qpid'];
		if($result == '' )
		{
			$result = 'qp00000000';
		}
		$result = ++$result;
		$qpid = $result;
		$query="INSERT INTO `ipm`.`qpbank` (qpid, qpname, noqs, dur, status, course, trade, syllabus, subject, negate) VALUES ('$qpid', '$qpname', '$noq', '$dur', '0', '$course', '$trade', '$syllabus', '$subject', '$negate');";
		$result=mysqli_query($db,$query);
		if($result)
		{
			session_start();
			$_SESSION['qpid'] = $qpid;
			$_SESSION['noq'] = $noq;
			$_SESSION['course'] = $course;
			$_SESSION['trade'] = $trade;
			$_SESSION['syllabus'] = $syllabus;
			$_SESSION['subject'] = $subject;
			$_SESSION['negate'] = $negate;
			
			header ('Location:../qncreator.php');
		}
		else
		{ 
			echo "invalid query: ".mysqli_error();
		}
	}
else
	{
		header("Location:../php_test.php");
	}




/*----------------------dump

	//from here
			$path=$course."/".$trade."/".$syllabus."/".$subject.".xml";
			$path='../qnbank/'.$path;
			if(file_exists($path))echo "I'm here";
			else
			{
				$myfile = fopen($path, "w") or die("Unable to open file!");
				$txt = "<?xml version='1.0' encoding='utf-8'?><question-bank></question-bank>";
				fwrite($myfile, $txt);
				fclose($myfile);
			}
			//to here code for creating
*/

?>