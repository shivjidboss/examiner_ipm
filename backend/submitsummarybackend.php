<?php


//dbversion
$mark=0;
$correct=0;
$questonmarks=0;
$anslist=[];
include ('mysqli_plug.php');
if($rand==0)
{
$query = "SELECT * from `qnsbank` WHERE `qnsbank`.`qpid` = '$qpid';";
$result=mysqli_query($db,$query);
while($temp=mysqli_fetch_array($result))
{
	for($a=0;$a < sizeof($uansd); $a++)
	{ 
		if($temp['qnid']==$uansd[$a]->qnid)
		{
			$questonmarks=$questonmarks+$temp['mark'];
			$ans = $uansd[$a]->uans;
			$t1 = explode(",",$ans);
			if($t1[0]=='>')$ans=$t1[1];
			if(("Option ".$ans)==$temp['ans'] || $ans==$temp['ans'])
			{ 
				$mark= $mark+$temp['mark'];
				$obj->qnid = $uansd[$a]->qnid;
				$obj->corr = "style='color: green;'>&#10003;";
				$obj->mrk = "+".$temp['mark'];
				$temp2 = json_encode($obj);
				array_push($anslist,$temp2);
				$correct++;
			}
			else
			{
				$obj->qnid = $uansd[$a]->qnid;
				$obj->corr = "style='color: red;'>&#10007;";
				$obj->mrk = "-".$temp['negmark'];
				$temp2 = json_encode($obj);
				array_push($anslist,$temp2);
				$mark= $mark-$temp['negmark'];
			}
		}
	}
}

echo("<br> <h2>Marks Scored =".$mark."/".$questonmarks."</h2>");

	session_start();
	$path=$_SESSION['course']."/".$_SESSION['trade']."/".$_SESSION['syllabus']."/".$_SESSION['userid'].".xml";
	$path='usertest_details/'.$path;
	if(file_exists($path))echo "I'm here";
	else
	{
		$myfile = fopen($path, "w") or die("Unable to open file!");
		$txt = "<?xml version='1.0' encoding='utf-8'?><userAnswer_Details></userAnswer_Details>";
		fwrite($myfile, $txt);
		fclose($myfile);
	}

			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;
			$dom->load($path);
			$dom->formatOutput = true;
			$userAnswer_Details = $dom->getElementsByTagName('userAnswer_Details')->item(0);
			$answer = $dom->createElement('answer');
			$answer = $userAnswer_Details->appendChild($answer);
			$answer->appendChild($dom->createElement('qpid',$qpid));
			$answer->appendChild($dom->createElement('noq',$noq));
			$answer->appendChild($dom->createElement('total',sizeof($uansd)));
			$answer->appendChild($dom->createElement('correct',$correct));
			$answer->appendChild($dom->createElement('uans',$uans));
			$answer->appendChild($dom->createElement('mark',$mark));
			$answer->appendChild($dom->createElement('qmark',$questonmarks));
			$dom->save($path);


			$userid = $_SESSION['userid'];
			$query ="SELECT * FROM `ipm`.`user_det` where `username` ='$userid' ;";
			$result=mysqli_query($db,$query);
			$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

			$totalqp= $result['totalqp'];
			$oldmark= $result['mark'];	
			$totalqp++;
			$oldmark = $oldmark + $mark; 
			$query = "UPDATE `ipm`.`user_det` SET `totalqp` = '$totalqp', `mark` = '$oldmark' WHERE `user_det`.`username` = '$userid';";
			$result=mysqli_query($db,$query);
		
		setcookie("qpid",$qpid,0,'/',NULL);
		setcookie("tqns",$noq,0,'/',NULL);
		setcookie("ansrd",sizeof($uansd),0,'/',NULL);
		setcookie("correct",$correct,0,'/',NULL);
		setcookie("mark",$mark,0,'/',NULL);
		setcookie("qmark",$questonmarks,0,'/',NULL);
		$anslist = json_encode($anslist);
		setcookie("anslist",$anslist,0,'/',NULL);
		header("Location:answersubmitprompt.php");
}

else
{
		for($a=0;$a < sizeof($uansd); $a++)
		{ 
			$userqnid = $uansd[$a]->qnid;
			$query = "SELECT * from `qnsbank` WHERE `qnsbank`.`qnid` = '$userqnid';";
			$result=mysqli_query($db,$query);
			$temp=mysqli_fetch_array($result,MYSQLI_ASSOC);
				
			if($temp['qnid']==$userqnid)
			{
				$questonmarks=$questonmarks+$temp['mark'];
				$ans = $uansd[$a]->uans;
				$t1 = explode(",",$ans);
				if($t1[0]=='>'){$ans=$t1[1];}

				if(("Option ".$ans)==$temp['ans'] || $ans==$temp['ans'])
				{ 
					$mark= $mark+$temp['mark'];
					$obj->qnid = $userqnid;
					$obj->corr = "style='color: green;'>&#10003;";
					$obj->mrk = "+".$temp['mark'];
					$temp2 = json_encode($obj);
					array_push($anslist,$temp2);
					$correct++;
				}
				else
				{
					$obj->qnid = $userqnid;
					$obj->corr = "style='color: red;'>&#10007;";
					$obj->mrk = "-".$temp['negmark'];
					$temp2 = json_encode($obj);
					array_push($anslist,$temp2);
					$mark= $mark-$temp['negmark'];
				}
			}
		}
	
	
	/*setcookie("total",sizeof($uansd),0,'/',NULL);
	setcookie("mark",$mark,0,'/',NULL);*/
	
	setcookie("qpid",'RandomQP',0,'/',NULL);
	setcookie("tqns",$noq,0,'/',NULL);
	setcookie("ansrd",sizeof($uansd),0,'/',NULL);
	setcookie("correct",$correct,0,'/',NULL);
	setcookie("mark",$mark,0,'/',NULL);
	setcookie("qmark",$questonmarks,0,'/',NULL);
	$anslist = json_encode($anslist);
	setcookie("anslist",$anslist,0,'/',NULL);
	header("Location:answersubmitprompt.php");
}
	





//dbversion




/*---------------------------dump



//get the marks

$dom = new DomDocument();
$dom->preserveWhiteSpace = false;


session_start();
$path=$_SESSION['course']."/".$_SESSION['trade']."/".$_SESSION['syllabus']."/".$_COOKIE['subject'].".xml";
$path='qnbank/'.$path;
$dom->load($path);
$dom->formatOutput = true;
$cnt=0;


$mark=0;
$correct=0;
$questonmarks=0;
for($a=0;$a < sizeof($uansd); $a++)
{ 
 foreach($dom->getElementsByTagName('question') as $question)
  { 
	if($question->childNodes[2]->nodeValue==$qpid)
	{ 
		if($question->childNodes[1]->nodeValue==$uansd[$a]->qnid)
		{ 
			$ans = $question->childNodes[8]->nodeValue;
			$mrk = $question->childNodes[9]->nodeValue;
			$cnt =0;
			$questonmarks=$questonmarks+$mrk;
			if(("Option ".$uansd[$a]->uans)==$ans)
			{ 
				$mark= $mark+$mrk;
				$correct++;
			}
		}
	  }
		++$cnt;
	}
  }  

echo("<br> <h2>Marks Scored =".$mark."/".$questonmarks."</h2>");

$path=$_SESSION['course']."/".$_SESSION['trade']."/".$_SESSION['syllabus']."/".$_SESSION['userid'].".xml";
$path='usertest_details/'.$path;
if(file_exists($path))echo "I'm here";
else
{
	$myfile = fopen($path, "w") or die("Unable to open file!");
	$txt = "<?xml version='1.0' encoding='utf-8'?><userAnswer_Details></userAnswer_Details>";
	fwrite($myfile, $txt);
	fclose($myfile);
}

		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->load($path);
		$dom->formatOutput = true;
		$userAnswer_Details = $dom->getElementsByTagName('userAnswer_Details')->item(0);
		$answer = $dom->createElement('answer');
		$answer = $userAnswer_Details->appendChild($answer);
		$answer->appendChild($dom->createElement('qpid',$qpid));
		$answer->appendChild($dom->createElement('noq',$noq));
		$answer->appendChild($dom->createElement('total',sizeof($uansd)));
		$answer->appendChild($dom->createElement('correct',$correct));
		$answer->appendChild($dom->createElement('uans',$uans));
		$answer->appendChild($dom->createElement('mark',$mark));
		$answer->appendChild($dom->createElement('qmark',$questonmarks));
		$dom->save($path);

	setcookie("qpid",$qpid,0,'/',NULL);
	setcookie("total",sizeof($uansd),0,'/',NULL);
	setcookie("correct",$correct,0,'/',NULL);
	setcookie("mark",$mark,0,'/',NULL);
	setcookie("qmark",$questonmarks,0,'/',NULL);
	header("Location:answersubmitprompt.php")
	
	
	
	*/
		
		
?>