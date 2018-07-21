<?php


//dbversion

include ('mysqli_plug.php');
$qpid = $_POST['qpid'];
$qnid = $_POST['qnid'];
$query = "SELECT * from `qnsbank` WHERE `qnsbank`.`qpid` = '$qpid';";
$result=mysqli_query($db,$query);
while($temp=mysqli_fetch_array($result))
{
	if($temp['qnid']==$qnid)
	{
		echo "Question: <br><textarea class='bdr-thm' name='qn' id='qn' rows='10' cols='100'>".$temp['qntxt']."</textarea>
				<fieldset class='bdr-thm opt-fldset'>
					<legend>Options</legend>
					Option 1: <input type='text' name='op1' size='50' value='".$temp['op1']."'/><br><br>
					Option 2: <input type='text' name='op2' size='50' value='".$temp['op2']."'/><br><br>
					Option 3: <input type='text' name='op3' size='50' value='".$temp['op3']."'/><br><br>
					Option 4: <input type='text' name='op4' size='50' value='".$temp['op4']."'/>		
				</fieldset>
				<br>
				Answer: <select name='ans'>
					<option>".$temp['ans']."</option>
					<option>Option 1</option>
					<option>Option 2</option>
					<option>Option 3</option>
					<option>Option 4</option>
				</select>
				<br><br>
				Mark: <input type='text' name='mrk' size='5'  value='".$temp['mark']."'/>
				<br><br>
				Negative Mark: <input type='text' name='negmrk' size='5'  value='".$temp['negmark']."'/>
				<br><br>";
	}
}





/*------------------dump



$path=$_COOKIE['admin_course']."/".$_COOKIE['admin_trade']."/".$_COOKIE['admin_syllabus']."/".$_COOKIE['admin_subject'].".xml";
$path='qnbank/'.$path;


unset($_COOKIE['admin_course']);
unset($_COOKIE['admin_trade']);
unset($_COOKIE['admin_syllabus']);
unset($_COOKIE['admin_subject']);

$dom = new DomDocument();
$dom->preserveWhiteSpace = false;
$dom->load("../".$path);
$dom->formatOutput = true;
foreach($dom->getElementsByTagName('question') as $question)
{
	if($question->childNodes[2]->nodeValue==$_POST['qpid'])
	{
		if($question->childNodes[1]->nodeValue==$_POST['qnid'])
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
			echo "Category: <select name='category'>
					<option>Category 1</option>
					<option>Category 2</option>
					<option>Category 3</option>
					<option>Category 4</option>
				</select>		
				<br><br>
				Question: <br><textarea class='bdr-thm' name='qn' rows='5' cols='100'>".$qntxt."</textarea>
				<fieldset class='bdr-thm opt-fldset'>
					<legend>Options</legend>
					Option 1: <input type='text' name='op1' size='50' value='".$opt1."'/><br><br>
					Option 2: <input type='text' name='op2' size='50' value='".$opt2."'/><br><br>
					Option 3: <input type='text' name='op3' size='50' value='".$opt3."'/><br><br>
					Option 4: <input type='text' name='op4' size='50' value='".$opt4."'/>		
				</fieldset>
				<br>
				Answer: <select name='ans'>
					<option>".$ans."</option>
					<option>Option 1</option>
					<option>Option 2</option>
					<option>Option 3</option>
					<option>Option 4</option>
				</select>
				<br><br>
				Mark: <input type='text' name='mrk' size='5'  value='".$mrk."'/>&nbsp;&nbsp;
				<br><br>";
		}
	}
}


*/

?>