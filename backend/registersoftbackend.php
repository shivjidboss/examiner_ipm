<?php
		
		$url = $_POST['url'];
        $path='../version.xml';

		if(file_exists($path))echo "I'm here";
		else
		{
		$myfile = fopen($path, "w") or die("Unable to open file!");
		$txt = "<?xml version='1.0' encoding='utf-8'?><version_Details></version_Details>";
		fwrite($myfile, $txt);
		fclose($myfile);
		}

		
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->load($path);
		$dom->formatOutput = true;
		$userAnswer_Details = $dom->getElementsByTagName('version_Details')->item(0);
		$answer = $dom->createElement('version');
		$answer = $userAnswer_Details->appendChild($answer);
		$answer->appendChild($dom->createElement('productv',"2.1"));
		$answer->appendChild($dom->createElement('url',$url));
		$dom->save($path);

		header("Location:../welcome.php");
?>