<?php
include ('mysqli_plug.php');
$id = NULL;
$subject = $_POST["subject"];
$subject = mysqli_real_escape_string($db, $subject);

$message = $_POST["message"];
$message = mysqli_real_escape_string($db, $message);


if($message=='null' && $subject=='null')
   { echo "Insertion not sucessfull"; header('Location:../notificationbank.php');}
 
$tablename = "notification";

$query ="SELECT MAX(`id`) AS id FROM $tablename ;";
$result=mysqli_query($db,$query);
$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($result['id']=='')
 $id = "not000001";
else 
 $id = ++$result['id'];

 
$query="INSERT INTO $tablename values('$id','1','$subject','$message',CURRENT_TIMESTAMP);";
$result=mysqli_query($db,$query);

if($result)
	{
		echo "Insertion successfull"; 
		header('Location:../notificationbank.php');
	}
	
else
	echo "Insertion not sucessfull";



/*function  makeFileName($size=8, $path="../upload/prof_pic/", $extension=".jpg")
{
    //if you give a path, don't forget the slash at end

    //$root = $_SERVER["DOCUMENT_ROOT"];   
	global $userid;
    $name = rand(0, str_repeat(9, $size));
    $name = str_pad($name, 8,  0, STR_PAD_LEFT).$extension;
    while(is_file($name))
	{
        makeFileName();
    }
	return $path.$userid.$extension;
}
*/



?>