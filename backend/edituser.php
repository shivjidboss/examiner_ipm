<?php

include ('mysqli_plug.php');
if($_FILES['imgfile']['tmp_name']!='') echo "file is here";

$userid = $_POST["username"];
$userid = mysqli_real_escape_string($db, $userid);

$name = $_POST["name"];
$name = mysqli_real_escape_string($db, $name);


$email = $_POST["email"];
$email = mysqli_real_escape_string($db, $email);


$gend = $_POST["gend"];
$gend = mysqli_real_escape_string($db, $gend);

$dob = $_POST["dob"];
$dob = mysqli_real_escape_string($db, $dob);

$phone = $_POST["phone"];
$phone = mysqli_real_escape_string($db, $phone);

$addr = $_POST["addr"];
$addr = mysqli_real_escape_string($db, $addr);

$institute = $_POST["institute"];
$institute = mysqli_real_escape_string($db, $institute);

$tablename = "user_det";


$query ="SELECT * FROM `$tablename` WHERE `username` = '$userid';";
$result=mysqli_query($db,$query);
$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

$course = $result['course'];
$trade = $result['trade'];
$syllabus = $result['syllabus'];
$password = $result['password'];

if($_FILES['imgfile']['tmp_name']!='') 
{
	$target_dir = "../Resources/uploads/imgid/";
	
	if($_POST['imgset']=='yes') 
		echo unlink($target_dir.$result['imgid']);
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
		if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) 
		{
			echo "The file ". basename( $_FILES["imgfile"]["name"]). " has been uploaded to " . $target_file;
			$query = "UPDATE `ipm`.`user_det` SET `name` = '$name', `sex` = '$gend', `dob` = '$dob', `email` = '$email', `phone` = '$phone', `addr` = '$addr', `institute` = '$institute', `imgid` = '$imgid' WHERE `user_det`.`username` = '$userid';";
		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
else
{
	if($_POST['imgset']=='yes') $imgid = $result['imgid'];
	else $imgid = "noimgid";
	$query = "UPDATE `ipm`.`user_det` SET `name` = '$name', `sex` = '$gend', `dob` = '$dob', `email` = '$email', `phone` = '$phone', `addr` = '$addr', `institute` = '$institute' WHERE `user_det`.`username` = '$userid';";
}


$result=mysqli_query($db,$query);

if($result)
	{
		
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
		
		setcookie("tempmessage","Student Detail Updated!",0,'/',NULL);
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