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

for($k=0;$k<6;$k++)
{
	$subjects[$k]="null";
}

for($k=0;$k<$noq;$k++)
{
	$subjects[$k]=$_POST["sub".($k+1)];
}

$sub0=$subjects['0'];
$sub1=$subjects['1'];
$sub2=$subjects['2'];
$sub3=$subjects['3'];
$sub4=$subjects['4'];
$sub5=$subjects['5'];

$duration = $_POST["duration"];
$duration = mysqli_real_escape_string($db, $duration);

$query="SELECT * from `ipm`.`practise_test` WHERE `course` = '$course' AND `trade`= '$trade' AND `syllabus` = '$syllabus';";
$result=mysqli_query($db,$query);

if(mysqli_num_rows($result)>0)
{
	
	$query="UPDATE `ipm`.`practise_test` SET `status` = '1', `noq` = '$noq', `duration` = '$duration', `sub1`= '$sub0',`nosubject` = '$nosubject', `sub2`= '$sub1',`sub3`= '$sub2',`sub4`= '$sub3',`sub5`= '$sub4',`sub6`= '$sub5' WHERE `course` = '$course' AND `trade` = '$trade' AND `syllabus` = '$syllabus';";
	$result=mysqli_query($db,$query);
}
 
else
{
$query="INSERT INTO `practise_test` values('$course','$trade','$syllabus','$nosubject','$noq','$duration','1','$sub0','$sub1','$sub2','$sub3','$sub4','$sub5');";
$result=mysqli_query($db,$query);
}

if($result)
{
	echo "\n Insertion successfull"; 
	header("Location:../practisetestbank.php");
}
else
	echo "Unsuccessful";

?>