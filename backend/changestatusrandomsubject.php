<?php

include ('mysqli_plug.php');


$course = $_POST["course"];
$course = mysqli_real_escape_string($db, $course);

$trade = $_POST["trade"];
$trade = mysqli_real_escape_string($db, $trade);

$syllabus = $_POST["syllabus"];
$syllabus = mysqli_real_escape_string($db, $syllabus);

$subject = $_POST["subject"];
$subject = mysqli_real_escape_string($db, $subject);

$noq = $_POST["noq"];
$noq = mysqli_real_escape_string($db, $noq);

$duration = $_POST["duration"];
$duration = mysqli_real_escape_string($db, $duration);

$active = $_POST["active"];
$active = mysqli_real_escape_string($db, $active);


echo("course=".$course);

$query="UPDATE `ipm`.`random_sub` SET `active` = '$active' WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' AND `subject` = '$subject' ;";
$result=mysqli_query($db,$query);

if($result)
{
	echo "\n Insertion successfull"; 
	header("Location:../randomsettingsbank.php");
}

else
{
	echo("error");
}
?>