<?php

include ('mysqli_plug.php');

$course = $_COOKIE['course'];
$trade = $_COOKIE['trade'];
$syllabus = $_COOKIE['syllabus'];
	

$query = "SELECT * FROM `ipm`.`practise_test` WHERE `course`= '$course' AND `trade`= '$trade' AND  `syllabus`= '$syllabus';";
$result = mysqli_query($db,$query);
if(!$result)
  echo("Random Not Intialised!");

else
  $result=mysqli_fetch_array($result,MYSQLI_ASSOC);



$totalnoq= $result['noq'];
$totalsub = $result['nosubject'];
$miss=0;
$total=0;


for($i=0;$i<$totalsub;$i++)
{
	$name="sub".($i+1);
	$subject[$i]=$result[$name];
}

for($sub=0;$sub<$totalsub;$sub++)
{

$query="SELECT qnid FROM `qnsbank` WHERE `course`= '$course' AND `trade`= '$trade' AND  `syllabus`= '$syllabus' AND  `subject`='$subject[$sub]';";
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
		$g=0;
		
		while($temp=mysqli_fetch_array($result))
			{
				$qnavailable[$g++] = $temp['qnid'];
			}
		
		//echo("Total number of questions:".$totalnoq);
		
		for($i=0;$i<$totalnoq;$i++)
		{
			$index= rand(0,$totalnoqavailable-1);
			
			$hit=0;
			for($j=0;$j<$total;$j++)
			{
				if($qnidarray[$j] == $qnavailable[$index])
				  	$hit=1;
			}
			
			if($hit==0)
			  $qnidarray[$total++] = $qnavailable[$index];
			else 
			{
				$hit=0;
				$i--;
			}
		}
		
		//for($i=0;$i<$totalnoq;$i++)
			//echo("..".$qnidarray[$i]);
			
		
	}

else 
		$miss=1;
}

if($miss==0)
	echo json_encode($qnidarray);
else
	echo("Questions not tally!");
?>