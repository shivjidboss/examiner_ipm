<?php

$cnt = 0;
include ('mysqli_plug.php');
$query = "SELECT * from `qnsbank` WHERE `qnsbank`.`qpid` = '$qpid';";
$result=mysqli_query($db,$query);
$rows = mysqli_num_rows($result);
$temp = null;
$temp=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($rows !=$_POST['noq'])
{
	$url = "qncreator.php";
	$_SESSION['qpid'] = $qpid;
	$_SESSION['noq'] = $_POST['noq']-$rows;
	$_SESSION['course'] = $temp['course'];
	$_SESSION['trade'] = $temp['trade'];
	$_SESSION['syllabus'] = $temp['syllabus'];
	$_SESSION['subject'] = $temp['subject'];
	$_SESSION['qpfull'] = 'no';
	echo "<div id='qntxt'><center><input type='button' class='button medbtn' value='Enter remaining ".$_SESSION['noq']." questions' onClick=document.location.href='".$url."' /></center></div><br>";
}
while($temp)
{
	echo "<div id='qntxt'><p>".$temp['qntxt']."</p></div>";
	echo "<div id='qnopt'><table id='qnopttbl'><colgroup><col /><col /></colgroup>";
	echo "<tr><td>".$temp['op1']."</td>";
	echo "<td>".$temp['op2']."</td>";
	echo "<tr><td>".$temp['op3']."</td>";
	echo "<td>".$temp['op4']."</td></tr>";
	echo "<tr><td colspan='2'> <button name='test' type='button' class='button smallbtn' value='".$temp['qnid']."' onclick='updateqn(this)'>Edit</button></tr></table></div><br>";
	$temp=mysqli_fetch_array($result,MYSQLI_ASSOC);
}
echo "<br>";



// dbversion



/*------------------dump
$path=$_COOKIE['admin_course']."/".$_COOKIE['admin_trade']."/".$_COOKIE['admin_syllabus']."/".$_COOKIE['admin_subject'].".xml";
$path='qnbank/'.$path;


$dom = new DomDocument();
$dom->preserveWhiteSpace = false;
$dom->load($path);
$dom->formatOutput = true;
foreach($dom->getElementsByTagName('question') as $question)
{
	if($question->childNodes[2]->nodeValue==$_POST['qpid'])
	{
		$catg = $question->childNodes[0]->nodeValue;
		$qnid = $question->childNodes[1]->nodeValue;
		$qpid = $question->childNodes[2]->nodeValue;
		$qntxt = $question->childNodes[3]->nodeValue;
		$opt1 = $question->childNodes[4]->nodeValue;
		$opt2 = $question->childNodes[5]->nodeValue;
		$opt3 = $question->childNodes[6]->nodeValue;
		$opt4 = $question->childNodes[7]->nodeValue;
		$ans = $question->childNodes[8]->nodeValue;
		$mrk = $question->childNodes[9]->nodeValue;
		echo "<div id='qntxt'><p>".$qntxt."</p></div>";
		echo "<div id='qnopt'><table id='qnopttbl'><colgroup><col /><col /></colgroup>";
		echo "<tr><td><input type='radio' name='qnopt' id='opt1' value='1'/>".$opt1."</td>";
		echo "<td><input type='radio' name='qnopt' id='opt2' value='2'/>".$opt2."</td>";
		echo "<tr><td><input type='radio' name='qnopt' id='opt3' value='3'/>".$opt3."</td>";
		echo "<td><input type='radio' name='qnopt' id='opt4' value='4'/>".$opt4."</td></tr>";
		echo "<tr><td colspan='2'> <button name='test' type='button' class='button smallbtn' value='".$qnid."' onclick='updateqn(this)'>Edit</button></tr></table><br>";
	}
}
echo "</p><br>";

*/



?>