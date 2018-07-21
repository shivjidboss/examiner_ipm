<?php
include ('mysqli_plug.php');
$username = mysqli_real_escape_string($db, $_POST["userid"]);
$password = mysqli_real_escape_string($db, $_POST["password"]);

if($password=="adminpass")
	{
		if($_POST['usrcatg']=="student")
		{
			$query = "SELECT * FROM `ipm`.`user_det` WHERE `user_det`.`username` = '$username';";
			$result=mysqli_query($db,$query);
			$result = mysqli_fetch_array($result,MYSQLI_ASSOC);

			$course = $result['course'];
			$trade = $result['trade'];
			$syllabus = $result['syllabus'];
			$imgid = $result['imgid'];
			
			echo("course: ".$course);	
			$path=$course."/".$trade."/".$syllabus."/".$username.".xml";
			$path='../usertest_details/'.$path;
				
			if(unlink($path)) echo("file deleted");
			$path = "../Resources/uploads/imgid/";
			if(unlink($path.$imgid)) echo("imgid deleted");
				
			$query = "DELETE FROM `ipm`.`user_det` WHERE `user_det`.`username` = '$username';";
			
			$result = mysqli_query($db,$query);

			if($result)
			 { 
			  echo " User Deleted ";
				setcookie("tempmessage","Student Detail Deleted!",0,'/',NULL);
				setcookie("tempuserid",$username,0,'/',NULL);
			  
			  header('Location:../summary.php');
			 } 
			else 
				echo("User deletion was not possible!");
		}
		else if($_POST['usrcatg']=="contentcreator")
		{
			$query = "DELETE FROM `ipm`.`content_det` WHERE `content_det`.`username` = '$username';";
			
			$result = mysqli_query($db,$query);

			if($result)
			 { 
			  echo " User Deleted ";
				setcookie("tempmessage","Content creator removed!",0,'/',NULL);
				setcookie("tempuserid",$username,0,'/',NULL);
			  
			  header('Location:../summary.php');
			 } 
			else 
				echo("User deletion was not possible!");
		}
	}
else
	 {	setcookie("authenpass","wrong",0,'/',NULL);
	 	header("Location:edituser.php");
		echo("Wrong Password");
	 }
?>