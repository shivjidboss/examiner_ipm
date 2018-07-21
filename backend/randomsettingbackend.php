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


$query="SELECT * from `ipm`.`random_sub` WHERE `course` = '$course' AND `trade`= '$trade' AND `syllabus` = '$syllabus' AND `subject` = '$subject' ;";
$result=mysqli_query($db,$query);

if(mysqli_num_rows($result)>0)
{
	
	$query="UPDATE `ipm`.`random_sub` SET `active` = '1', `noq` = '$noq', `duration` = '$duration' WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus' AND `subject` = '$subject' ;";
	$result=mysqli_query($db,$query);
}
 
else
{
$query="INSERT INTO `random_sub` values('$course','$trade','$syllabus','$subject','$noq','$duration',1);";
$result=mysqli_query($db,$query);
}

if($result)
{
	echo "\n Insertion successfull"; 
	header("Location:../randomsettingsbank.php");
}

?>