<?php

//-------------dbversion

$pset=1;
$variables = array('qnid', 'qpid', 'qn', 'op1', 'op2', 'op3', 'op4', 'ans', 'mrk', 'negmrk');
foreach($variables as $variable_name)
{
	if(!isset($_POST[$variable_name]) && empty($_POST[$variable_name]))
		{
			$pset=0;
		}
}
if($pset==1)
{
	include ('mysqli_plug.php');
	$qnid = $_POST['qnid'];
	$qntxt = mysqli_real_escape_string($db, $_POST['qn']);
	$op1 = mysqli_real_escape_string($db, $_POST['op1']);
	$op2 = mysqli_real_escape_string($db, $_POST['op2']);
	$op3 = mysqli_real_escape_string($db, $_POST['op3']);
	$op4 = mysqli_real_escape_string($db, $_POST['op4']);
	$ans = $_POST['ans'];
	$mark = mysqli_real_escape_string($db, $_POST['mrk']);
	$negmark = mysqli_real_escape_string($db, $_POST['negmrk']);
	$fullans = 'notworkedout';

	$query = "UPDATE `ipm`.`qnsbank` SET `qntxt` = '$qntxt' , `op1` = '$op1' , `op2` = '$op2' , `op3` = '$op3' , `op4` = '$op4' , `ans` = '$ans' , `mark` = '$mark' , `negmark` = '$negmark', `fullans` = '$fullans' WHERE `qnsbank`.`qnid` = '$qnid';";
	$result=mysqli_query($db,$query);

	if($result)
	{
		echo "<h1>Question updated</h1>";
		
		
			
		setcookie("tempmessage","Question Updated!",0,'/',NULL);
		setcookie("tempqpid",$_POST['qpid'],0,'/',NULL);
	  
		header('Location:../summary.php');	
	}	
	else
	{
		echo "Question updation failed!";
		echo "invalid query: ".mysqli_error();
	}
}

//-------------dbversion





/* ----------------dump

$pset=1;
$variables = array('qnid', 'qpid', 'qn', 'op1', 'op2', 'op3', 'op4', 'ans', 'mrk');
foreach($variables as $variable_name)
	{
		if(!isset($_POST[$variable_name]) && empty($_POST[$variable_name]))
			{
				$pset=0;
			}
	}
if($pset==1)
	{
		$path=$_COOKIE['admin_course']."/".$_COOKIE['admin_trade']."/".$_COOKIE['admin_syllabus']."/".$_COOKIE['admin_subject'].".xml";
		$path='qnbank/'.$path;

		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->load("../".$path);
		$dom->formatOutput = true;
		foreach($dom->getElementsByTagName('question') as $question)
		{
			if($question->childNodes[2]->nodeValue==$_POST['qpid'])
			{
				if($question->childNodes[1]->nodeValue==$_POST['qnid'])
				{
					$question->childNodes[3]->nodeValue = $_POST['qn'];
					$question->childNodes[4]->nodeValue = $_POST['op1'];
					$question->childNodes[5]->nodeValue = $_POST['op2'];
					$question->childNodes[6]->nodeValue = $_POST['op3'];
					$question->childNodes[7]->nodeValue = $_POST['op4'];
					$question->childNodes[8]->nodeValue = $_POST['ans'];
					$question->childNodes[9]->nodeValue = $_POST['mrk'];
				}
			}
		}
		$dom->save("../".$path);
		
		
		echo "<h1>Question updated</h1>";
		
		
			
		setcookie("tempmessage","Question Updated!",0,'/',NULL);
		setcookie("tempqpid",$_POST['qpid'],0,'/',NULL);
	  
		header('Location:../summary.php');	


	}



*/

?>