<?php

include ('mysqli_plug.php');

$course = $_POST["course"];
$course = mysqli_real_escape_string($db, $course);

$trade = $_POST["trade"];
$trade = mysqli_real_escape_string($db, $trade);


$syllabus = $_POST["syllabus"];
$syllabus = mysqli_real_escape_string($db, $syllabus);


$query="SELECT * FROM `user_det` WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' ORDER BY `mark`/`totalqp` DESC ";



$result=mysqli_query($db,$query);

//echo($result);

if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			echo("<table class='tbl'>");
			echo("<tr class='tbl_head'><td>Rank</td><td>ID</td><td>Name</td><td>Total Questions Papers</td><td>Average Mark</td>");
			$round =0;
			while($temp=mysqli_fetch_array($result))
			{
				if($temp['totalqp']!=0)$avgmrk = $temp['mark']/$temp['totalqp'];else $avgmrk = 0;
				echo("<tr><td>".++$round."<td>".$temp['username']."</td><td>".$temp['name']."</td><td>".$temp['totalqp']."</td><td>".$avgmrk."</td></tr>");
			}
			
			echo("</table>");
		}
		else echo "Rank List Cannot be Calculated";
	}
		
else
{
	die('failed'.mysqli_error());
}


?>