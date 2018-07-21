<?php

include ('mysqli_plug.php');

$userid = NULL;

$fname = $_POST["fname"];
$fname = mysqli_real_escape_string($db, $fname);

$lname = $_POST["lname"];
$lname = mysqli_real_escape_string($db, $lname);

$name = $fname." ".$lname;

$email = $_POST["email"];
$email = mysqli_real_escape_string($db, $email);

$password = $_POST["password"];
$password = mysqli_real_escape_string($db, $password);

$gend = $_POST["gend"];
$gend = mysqli_real_escape_string($db, $gend);


$phone = $_POST["phone"];
$phone = mysqli_real_escape_string($db, $phone);

$tablename = "content_det";

$query ="SELECT MAX(`username`) AS usrid FROM $tablename ;";
$result=mysqli_query($db,$query);
$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($result['usrid']=='')
 $userid = "cont000001";
else 
 $userid = ++$result['usrid'];

 
$query="INSERT INTO $tablename values('$userid','$name','$password','$gend','$phone','$email');";
$result=mysqli_query($db,$query);

if($result) echo "Insertion successfull"; 
	
else echo "Insertion not sucessfull";

		setcookie("tempmessage","Content Creator Detail Entered!",0,'/',NULL);
		setcookie("tempuserid",$userid,0,'/',NULL);
	    setcookie("tempname",$name,0,'/',NULL);
		setcookie("temppassword",$password,0,'/',NULL);
		setcookie("tempgend",$gend,0,'/',NULL);
		setcookie("tempemail",$email,0,'/',NULL);
		setcookie("tempphone",$phone,0,'/',NULL);

		header('Location:../summary.php');


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