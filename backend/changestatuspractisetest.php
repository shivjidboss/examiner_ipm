<?php
include ('mysqli_plug.php');

$course = $_POST["course"];
$course = mysqli_real_escape_string($db, $course);

$trade = $_POST["trade"];
$trade = mysqli_real_escape_string($db, $trade);

$syllabus = $_POST["syllabus"];
$syllabus = mysqli_real_escape_string($db, $syllabus);

$nosubject = $_POST["nosubject"];
$nosubject = mysqli_real_escape_string($db, $nosubject);

$noq = $_POST["noq"];
$noq = mysqli_real_escape_string($db, $noq);

$duration = $_POST["duration"];
$duration = mysqli_real_escape_string($db, $duration);

$status = $_POST["status"];
$status = mysqli_real_escape_string($db, $status);

echo("course=".$course);

$query="UPDATE `ipm`.`practise_test` SET `status` = '$status' WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' AND `nosubject` = '$nosubject' ;";
$result=mysqli_query($db,$query);

if($result)
{
	echo "\n Insertion successfull"; 
	header("Location:../practisetestbank.php");
}

else
{
	echo("error");
}
?>