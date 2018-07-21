<?php

include ('mysqli_plug.php');

$course = $_COOKIE['course'];
$trade = $_COOKIE['trade'];
$syllabus = $_COOKIE['syllabus'];
$subject = $_COOKIE['subject'];
	

$query = "SELECT * FROM `ipm`.`random_sub` WHERE `course`= '$course' AND `trade`= '$trade' AND  `syllabus`= '$syllabus' AND  `subject`='$subject';";
$result = mysqli_query($db,$query);
$result=mysqli_fetch_array($result,MYSQLI_ASSOC);


$totalnoq= $result['noq'];
if(!$result)
  echo("Random Not Intialised!");

$query="SELECT qnid FROM `qnsbank` WHERE `course`= '$course' AND `trade`= '$trade' AND  `syllabus`= '$syllabus' AND  `subject`='$subject';";
$result=mysqli_query($db,$query);
if($result)
	{
	   $totalnoqavailable=mysqli_num_rows($result);
	}
		
else
	{
		echo("NO content found");
		die('failed'.mysqli_error());
	}

if($totalnoq<=$totalnoqavailable)
	{
		while($temp=mysqli_fetch_array($result))
			{
				$qnavailable[] = $temp['qnid'];
			}
		
		//echo("Total number of questions:".$totalnoq);
		
		for($i=0;$i<$totalnoq;$i++)
		{
			$index= rand(0,$totalnoqavailable-1);
			
			$hit=0;
			for($j=0;$j<$i;$j++)
			{
				if($qnidarray[$j] == $qnavailable[$index])
				  	$hit=1;
			}
			
			if($hit==0)
			  $qnidarray[$i] = $qnavailable[$index];
			else 
			{
				$hit=0;
				$i--;
			}
		}
		
		//for($i=0;$i<$totalnoq;$i++)
			//echo("..".$qnidarray[$i]);
			echo json_encode($qnidarray);
		
	}

else 
		echo("Questions not tally!");


?>