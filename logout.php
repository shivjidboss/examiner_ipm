<?php

	session_start();
	session_unset();//unsets all session variables
	session_destroy();
	
	//clearing all cookies
	
	if (isset($_SERVER['HTTP_COOKIE'])) 
	{
    	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    	foreach($cookies as $cookie) 
		{
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			setcookie($name, '', time()-1000);
			setcookie($name, '', time()-1000, '/');
    	}
	}
header("Location:index.php");	
	
/*	unset($_COOKIE['userid']);
	unset($_COOKIE['name']);
	unset($_COOKIE['dob']);
	unset($_COOKIE['sex']);
	unset($_COOKIE['email']);
	unset($_COOKIE['phone']);
	unset($_COOKIE['course']);
	unset($_COOKIE['trade']);
	unset($_COOKIE['syllabus']);*/
	
?>