<?php

include ('mysqli_plug.php');

$course = $_POST["course"];
$course = mysqli_real_escape_string($db, $course);

$trade = $_POST["trade"];
$trade = mysqli_real_escape_string($db, $trade);


$syllabus = $_POST["syllabus"];
$syllabus = mysqli_real_escape_string($db, $syllabus);


$duration = $_POST["duration"];
$duration = mysqli_real_escape_string($db, $duration);

$active = $_POST["active"];
$active = mysqli_real_escape_string($db, $active);


$query = "DELETE FROM `random_sub` WHERE `course` = `".$course."` AND `trade` = ".$trade." AND `syllabus` = `".$syllabus." AND `duration` = `".$duration." AND `active` = `".$active."`;";

$result=mysqli_query($db,$query);

if($result)
    {
		echo("INsertion Possible");
		header('Location:../adminprofile.php');
	}
else 
	echo("Insertion Not Possible");
		
?>