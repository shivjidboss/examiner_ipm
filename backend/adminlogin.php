<?php

	include ('mysqli_plug.php');
	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$isadmin = $_POST['isadmin'];

	if($isadmin=='1')
	{
	$query ="SELECT * FROM `admin_det` WHERE userid = '$username' AND password = '$password';";

	$result=mysqli_query($db,$query);
	$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if ($result)
	{
		//validating sessions
		session_start();
		$_SESSION['userid'] = $result['userid'];
		$_SESSION['authority'] = $result['authority'];
		
		//validating cookies
		setcookie("userid",$result['username'],0,'/',NULL);
		setcookie("authority",$result['authority'],0,'/',NULL);
		
		header('Location:../adminprofile.php');		 
	 }
	 
	else
	 {
		echo("not happy!");
		unset($_COOKIE['userid']);
		unset($_COOKIE['authority']);
		header('Location:../loginfailed.php');
	 }
	}

	else
	{
		$query ="SELECT * FROM `content_det` WHERE username = '$username' AND password = '$password';";

	$result=mysqli_query($db,$query);
	$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if ($result)
	{
		//validating sessions
		session_start();
		$_SESSION['userid'] = $result['username'];
		$_SESSION['authority'] = 'content';
		
		//validating cookies
		setcookie("userid",$result['username'],0,'/',NULL);
		setcookie("authority",'content',0,'/',NULL);
		
		header('Location:../adminprofile.php');		 
	 }
	 
	else
	 {
		echo("not happy!");
		unset($_COOKIE['userid']);
		unset($_COOKIE['authority']);
		header('Location:../loginfailed.php');
	 }
		
	}
?>