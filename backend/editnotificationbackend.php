<?php
include ('mysqli_plug.php');

$id = $_POST["id"];
$id = mysqli_real_escape_string($db, $id);

$status = $_POST["status"];
$status = mysqli_real_escape_string($db, $status);


$subject = $_POST["subject"];
$subject = mysqli_real_escape_string($db, $subject);

$message = $_POST["message"];
$message = mysqli_real_escape_string($db, $message);

if($message=='null' && $subject=='null')
   { echo "Insertion not sucessfull"; header('Location:../notificationbank.php');}


$tablename = "notification";

$query ="UPDATE `ipm`.`notification` SET `enable` = '$status', `subject` = '$subject', `message` = '$message' WHERE `notification`.`id` = '$id';";
$result=mysqli_query($db,$query);

if($result)
	{
		echo "Insertion successfull"; 
		header('Location:../notificationbank.php');
	}
	
else
	echo "Insertion not sucessfull";


?>