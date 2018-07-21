<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>What I know</title>
</head>

<body>
<?php
    session_start();
    echo "<h2> Here's what I know about you</h2>";
	echo "<p>Refresh me to view all GLOBAL variables available now</p><hr>";
	echo "<h3>SESSION</h3>";
    foreach ($_SESSION as $key=>$val)
    echo "<b>".$key.":</b>&nbsp;&nbsp;&nbsp;".$val."<br><br>";
	echo "<hr>";
	echo "<h3>COOKIE</h3>";
    foreach ($_COOKIE as $key=>$val)
    echo "<b>".$key.":</b>&nbsp;&nbsp;&nbsp;".$val."<br><br>";
	echo "<hr>";
//This code may be pasted in any php which receives a POST request to display all POST variables	
/*	
    foreach ($_POST as $key=>$val)
    echo $key." ".$val."<br/>";
	echo "<hr>";
*/ 
	
?>
<form action="logout.php">
    <input type="submit" value="Logout" />
</form>
<br><a href="index.php"> Home Page</a>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>