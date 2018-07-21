<?php 
$course = $_POST['course'];
$trade="";$syllabus="";$subject="";

if(isset($_POST['trade']))$trade = $_POST['trade'];
if(isset($_POST['syllabus']))$syllabus = $_POST['syllabus'];
if(isset($_POST['subject']))$subject = $_POST['subject'];


include ('mysqli_plug.php');
if($course && !$trade && !$syllabus && !$subject)
{
	$query="INSERT INTO `ipm`.`course` values('$course');";
	mkdir("../qnbank/".$course."/" , 0777);
	echo "Directory ../qnbank/".$course."/  created";
	
	//create user directory for userdetails
	mkdir("../usertest_details/".$course."/" , 0777);
	echo "Directory ".$path."/  created";
		
}


if($course && $trade && !$syllabus && !$subject)
{
	$query="INSERT INTO `ipm`.`trade` values('$course','$trade');";
	$path=$course."/".$trade;
	mkdir("../qnbank/".$path."/" , 0777);
	echo "Directory ../qnbank/".$path."/  created";
	
	//create user directory for userdetails
	mkdir("../usertest_details/".$path."/" , 0777);
	echo "Directory ../qnbank/".$path."/  created";
	
	
}

if($course && $trade && $syllabus && !$subject)
{
	$query="INSERT INTO `ipm`.`syllabus` values('$course','$trade','$syllabus');";
	$path=$course."/".$trade."/".$syllabus;
	mkdir("../qnbank/".$path."/" , 0777);
	echo "Directory ../qnbank/".$path."/  created";
	
	//create user directory for userdetails
	mkdir("../usertest_details/".$path."/" , 0777);
	echo "Directory ../qnbank/".$path."/  created";
	
}


if($course && $trade && $syllabus && $subject)
{
	$query="INSERT INTO `ipm`.`subject` values('$course','$trade','$syllabus','$subject');";
	$path=$course."/".$trade."/".$syllabus;
	mkdir("../qnbank/".$path."/" , 0777);
	echo "Directory ../qnbank/".$path."/  created";
	
	//create user directory for userdetails
	mkdir("../usertest_details/".$path."/" , 0777);
	echo "Directory ../qnbank/".$path."/  created";
	
}


$result=mysqli_query($db,$query);

if($result)
	{
		echo "Insertion successfull";
	}
?>