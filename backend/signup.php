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

$dob = $_POST["dob"];
$dob = mysqli_real_escape_string($db, $dob);

$addr = $_POST["addr"];
$addr = mysqli_real_escape_string($db, $addr);

$institute = $_POST["institute"];
$institute = mysqli_real_escape_string($db, $institute);

$trade = $_POST["trade"];
$trade = mysqli_real_escape_string($db, $trade);

$course = $_POST["course"];
$course = mysqli_real_escape_string($db, $course);

$syllabus = $_POST["syllabus"];
$syllabus = mysqli_real_escape_string($db, $syllabus);

$phone = $_POST["phone"];
$phone = mysqli_real_escape_string($db, $phone);

$tablename = "user_det";

$query ="SELECT MAX(`username`) AS usrid FROM $tablename ;";
$result=mysqli_query($db,$query);
$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($result['usrid']=='')
 $userid = "ipm000001";
else 
 $userid = ++$result['usrid'];
 

if ($_FILES['imgfile']['tmp_name']!='') 
{
	$target_dir = "../Resources/uploads/imgid/";
	$target_file = $target_dir . basename($_FILES["imgfile"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$target_file = $target_dir . $userid . "." . $imageFileType;
	$imgid = $userid . "." . $imageFileType;
	// Check if image file is a actual image or fake image

		$check = getimagesize($_FILES["imgfile"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

	// Check file size
	if ($_FILES["imgfile"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["imgfile"]["name"]). " has been uploaded to " . $target_file;
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
else
{
	$imgid = "noimgid";
}
 
$query="INSERT INTO $tablename values('$userid','$password','$name','$gend','$dob','$email','$phone','$addr','$institute','$course','$trade','$syllabus','$imgid',0,0);";
$result=mysqli_query($db,$query);

if($result)
	{
		echo "\n Insertion successfull"; 
		
		//create xml files for userusertest_detailsbackend
		$path=$course."/".$trade."/".$syllabus."/".$userid.".xml";
        $path='../usertest_details/'.$path;
		if(file_exists($path))echo "I'm here";
		else
		{
		$myfile = fopen($path, "w") or die("Unable to open file!");
		$txt = "<?xml version='1.0' encoding='utf-8'?><userAnswer_Details></userAnswer_Details>";
		fwrite($myfile, $txt);
		fclose($myfile);
		}
		
		
		setcookie("tempmessage","Student Detail Entered!",0,'/',NULL);
		setcookie("tempuserid",$userid,0,'/',NULL);
	    setcookie("tempname",$name,0,'/',NULL);
		setcookie("temppassword",$password,0,'/',NULL);
		setcookie("tempgend",$gend,0,'/',NULL);
		setcookie("tempdob",$dob,0,'/',NULL);
		setcookie("tempemail",$email,0,'/',NULL);
		setcookie("tempphone",$phone,0,'/',NULL);
		setcookie("tempaddr",$addr,0,'/',NULL);
		setcookie("tempinstitute",$institute,0,'/',NULL);
		setcookie("tempcourse",$course,0,'/',NULL);
		setcookie("temptrade",$trade,0,'/',NULL);
		setcookie("tempsyllabus",$syllabus,0,'/',NULL);
		setcookie("imgid",$imgid,0,'/',NULL);
		header('Location:../summary.php');
		
		
	}
	
else
	echo "\nInsertion not sucessfull";


?>