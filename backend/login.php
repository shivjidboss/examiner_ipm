<?php

	include ('mysqli_plug.php');
	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	$query ="SELECT * FROM `user_det` WHERE username = '$username' AND password = '$password';";

	$result=mysqli_query($db,$query);
	$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if ($result)
	{
		$userid = $result['username'];
		//setting sessions
		session_start();
		$_SESSION['userid'] = $result['username'];
		$_SESSION['name'] = $result['name'];
		$_SESSION['course'] = $result['course'];
		$_SESSION['trade'] = $result['trade'];
		$_SESSION['syllabus'] = $result['syllabus'];
		
		//setting cookies
		setcookie("imgid",$result['imgid'],0,'/',NULL);
		setcookie("userid",$result['username'],0,'/',NULL);
	    setcookie("name",$result['name'],0,'/',NULL);
		setcookie("dob",$result['dob'],0,'/',NULL);
		setcookie("sex",$result['sex'],0,'/',NULL);
		setcookie("email",$result['email'],0,'/',NULL);
		setcookie("phone",$result['phone'],0,'/',NULL);
		setcookie("course",$result['course'],0,'/',NULL);
		setcookie("trade",$result['trade'],0,'/',NULL);
		setcookie("syllabus",$result['syllabus'],0,'/',NULL);
		
		$tock = sha1($userid.time().mt_rand());
		$usr_ip = get_ip_address();
		$query = "INSERT INTO `sessions` (userid,tock,usr_ip,expiry) VALUES ('$userid','$tock','$usr_ip','0');";
		$result=mysqli_query($db,$query);
		setcookie("tock",$tock,NULL,'/',NULL);
		
		
		header('Location:../profile.php');		 
	 }
	 
	else
	 {
		echo("not happy!");
		unset($_COOKIE['userid']);
		unset($_COOKIE['name']);
		unset($_COOKIE['dob']);
		unset($_COOKIE['sex']);
		unset($_COOKIE['email']);
		unset($_COOKIE['phone']);
		unset($_COOKIE['course']);
		unset($_COOKIE['trade']);
		unset($_COOKIE['syllabus']);
	
		header('Location:../loginfailed.php');
	 }
	 
	 
/*

function get_ip_address() 
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}
*/


function get_ip_address() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

?>