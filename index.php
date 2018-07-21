<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
</head>

<body>


<?php

$dom = new DomDocument();
$dom->preserveWhiteSpace = false;
$path="version.xml";
	
if(file_exists($path))
{
$dom->load($path);
$dom->formatOutput = true;
/*$version = $dom->getElementsByTagName('version');
for($i=0;$i<sizeof($version);$i++)*/
	foreach($dom->getElementsByTagName('version') as $version)
	{
				$productv = $version->childNodes[0]->nodeValue;
				$url = $version->childNodes[1]->nodeValue;		
	}


	$path = $url."authenipm.xml";
	echo $path."<br>";
	if(file_exists($path))
	{

		$dom->load($path);
		$dom->formatOutput = true;

		foreach($dom->getElementsByTagName('version') as $version)
		{	
			$day = $version->childNodes[0]->nodeValue;
			$month = $version->childNodes[1]->nodeValue;
			$year = $version->childNodes[2]->nodeValue;
		}

		$date = new DateTime($day.'-'.$month.'-'.$year);
		$active = $date->format('Y-m-d');

		$today = date("Y-m-d");
		if(strtotime($active) > strtotime($today))// checck wether if date expired
		{
			setcookie("active",$active,0,'/',NULL);
			header("Location:welcome.php");
		}
		else
		{
			echo("<img src='Resources/expire.jpg' style='width: 510px;padding-left: 350px;'>");
		}

	}
	else
	  echo("authentication file missing");

	//$dom->load($path);
	//$dom->formatOutput = true;
}
else
{
	echo("<a href='registersoft.php'><img src='Resources/Register-now-1024x470.jpg' style='padding-left: 147px;
    padding-top: 50px;'></a>");
}
?>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>