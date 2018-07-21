<?php

$dom = new DomDocument();
$dom->preserveWhiteSpace = false;

$path=$_SESSION['course']."/".$_SESSION['trade']."/".$_SESSION['syllabus']."/".$_SESSION['userid'].".xml";
$path='usertest_details/'.$path;
$dom->load($path);
$dom->formatOutput = true;
$cnt=0;
$graphmarks = array('0' => '0');

/*$question = $dom->getElementsByTagName('question');
for($i=0;$i<sizeof($question);$i++)*/



$cummulativietotal=0;
$cummulativienoq=0;
$cummulativiecorrect=0;
$cummulativiemarks = 0;
$cummulativieqmarks = 0;
foreach($dom->getElementsByTagName('answer') as $answer)
{
			$qpid = $answer->childNodes[0]->nodeValue;
			$noq = $answer->childNodes[1]->nodeValue;
			$total = $answer->childNodes[2]->nodeValue;
			$correct = $answer->childNodes[3]->nodeValue;
			$uans = $answer->childNodes[4]->nodeValue;
			$marks = $answer->childNodes[5]->nodeValue;
			$qmarks = $answer->childNodes[6]->nodeValue;
	
			$cummulativienoq = $cummulativienoq+$noq;
			$cummulativietotal=$cummulativietotal+$total;
			$cummulativiecorrect=$cummulativiecorrect+$correct;
			$cummulativiemarks = $cummulativiemarks+$marks;
			$cummulativieqmarks = $cummulativieqmarks+$qmarks;
			
			if($qmarks!=0)
			$graphmarks[$cnt] = round(($marks/$qmarks)*100);

			++$cnt;
}
	
?>