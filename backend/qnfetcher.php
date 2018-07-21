<?php


// dbversion
$qnid = $_POST['qnid'];
include ('mysqli_plug.php');
$query = "SELECT * from `qnsbank` WHERE `qnsbank`.`qnid` = '$qnid';";
$result=mysqli_query($db,$query);
$temp=mysqli_fetch_array($result,MYSQLI_ASSOC);

if($temp['qntype']=='MCQ')
{

	echo "<div id='qntxt'><div id='mrkdet'>Mark: ".$temp['mark'];
	if($temp['negmark']==0) echo "</div><p>".$temp['qntxt']."</p></div>";
	else echo "<br>Neg mark: ".$temp['negmark']."</div><p>".$temp['qntxt']."</p></div>";
	echo "<div id='qnopt'><table id='qnopttbl'><colgroup><col /><col /></colgroup>";
	echo "<tr><td><input type='checkbox' class='retrochkbox' name='qnopt[]' id='opt1' value='1'/><label for='opt1'>".$temp['op1']."</label><div class='check'></div></td>";
	echo "<td><input type='checkbox' class='retrochkbox' name='qnopt[]' id='opt2' value='2'/><label for='opt2'>".$temp['op2']."</label><div class='check'></div></td>";
	echo "<tr><td><input type='checkbox' class='retrochkbox' name='qnopt[]' id='opt3' value='3'/><label for='opt3'>".$temp['op3']."</label><div class='check'></div></td>";
	echo "<td><input type='checkbox' class='retrochkbox' name='qnopt[]' id='opt4' value='4'/><label for='opt4'>".$temp['op4']."</label><div class='check'></div></td></tr>";
	if(isset($_POST['rview']))echo "<tr><td colspan='2'> Mark for review<input type='checkbox' id='reviewme'/></td></tr></table>";
	//else echo "<tr><td colspan='2'><font>Review Question</font></td></tr></table>";
	echo "</table>";
	echo "<input type='hidden' id='qnid' value='".$temp['qnid']."' />";
	
}

else
{
	echo "<div id='qntxt'><div id='mrkdet'>Mark: ".$temp['mark'];
	if($temp['negmark']==0) echo "</div><p>".$temp['qntxt']."</p></div>";
	else echo "<br>Neg mark: ".$temp['negmark']."</div><p>".$temp['qntxt']."</p></div>";
	echo "<div id='qnopt'><table id='qnopttbl'><colgroup><col /><col /></colgroup>";
	echo "<tr><td>Answer:</td><td><input type='textbox' name='qnopt[]' id='opt1' value=''/></td></tr>";
	if(isset($_POST['rview']))echo "<tr><td colspan='2'> Mark for review<input type='checkbox' id='reviewme'/></td></tr></table>";
	//else echo "<tr><td colspan='2'><font>Review Question</font></td></tr></table>";
	echo "</table>";
	echo "<input type='hidden' id='qnid' value='".$temp['qnid']."' />";
}




// dbversion





/*------------------------dump




--------------------------------------
<ul>
				  <li>
					<input type='radio' id='f-option' name='selector'>
					<label for='f-option'>Pizza</label>

					<div class='check'></div>
				  </li>

				  <li>
					<input type='radio' id='s-option' name='selector'>
					<label for='s-option'>Boyfriend</label>

					<div class='check'><div class='insider'></div></div>
				  </li>

				  <li>
					<input type='radio' id='t-option' name='selector'>
					<label for='t-option'>Cats</label>

					<div class='check'><div class='insider'></div></div>
				  </li>
				</ul>
--------------------------------------

$dom = new DomDocument();
$dom->preserveWhiteSpace = false;


session_start();
$path=$_SESSION['course']."/".$_SESSION['trade']."/".$_SESSION['syllabus']."/".$_COOKIE['subject'].".xml";
$path='../qnbank/'.$path;
$dom->load($path);
$dom->formatOutput = true;
$cnt=0;

foreach($dom->getElementsByTagName('question') as $question)
{
	if($question->childNodes[2]->nodeValue==$_POST['qpid'])
	{
		if($cnt==$_POST['qsnno'])
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
			echo "<tr><td colspan='2'> Mark for review<input type='checkbox' id='reviewme'/></tr></table>";
			echo "<input type='hidden' id='qnid' value='".$qnid."' />";
		}
		++$cnt;
	}
}





/*-------------------dump 2


//from here --------to be used in script for generating random question set
function rand_arr($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
$qnset = rand_arr(0,10,5);

$json_qnset = json_encode($qnset);
//--------- to here


//prints full qn bank in a category
$question = $dom->getElementsByTagName('question');
for($i=0;$i<sizeof($qnset);$i++)
{
	$catg = $question[$qnset[$i]]->childNodes[0]->nodeValue;
	$qntxt = $question[$qnset[$i]]->childNodes[1]->nodeValue;
	$opt1 = $question[$qnset[$i]]->childNodes[2]->nodeValue;
	$opt2 = $question[$qnset[$i]]->childNodes[3]->nodeValue;
	$opt3 = $question[$qnset[$i]]->childNodes[4]->nodeValue;
	$opt4 = $question[$qnset[$i]]->childNodes[5]->nodeValue;
	echo "<div id='qn-txt'><p>".$qntxt."</p></div>";
	echo "<div id='qn-opt'><div id='opt' class='opt1'>".$opt1."</div><div id='opt' class='opt2'>".$opt2."</div>";
	echo "<div id='opt' class='opt3'>".$opt3."</div><div id='opt' class='opt4'>".$opt4."</div>";
}

*/
?>