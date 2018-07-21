<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 

<link rel="stylesheet" href="/ipm/css/qncreator.css" type="text/css"/>
<script src="/ipm/js/qncreator.js"></script>
<?php session_start(); ?>  
</head>

<body>

<div id="topbar">
	<div id="mainlogo"></div>
	<div id="tpbarright">
		<div id="tpbartxt">
				<?php
					if(isset($_SESSION['userid']))	
					 {echo ("USERID: ".$_SESSION['userid']);
					  echo("<a class='button logout' href='logout.php'>Logout</a>");
					 }
					else	
						header("Location:adminlogin.php");
				?>
		</div>
		<div class="gendicon <?php echo ('male'); ?>"></div>
	</div>
</div>
<div id="main">
	<div id="leftpane">
		<?php include("adminsidebar.php");	?>
	</div>
	<div id="surface">
		<div id="body_card">
			<h3>Add Questions</h3>
			<br>
			<?php 
			
			echo "<div id='qpdetails'><table><tbody><tr><td>".$_SESSION['course']."</td><td> &gt;</td><td>".$_SESSION['trade']."</td><td>&gt;</td><td>".$_SESSION['syllabus']."</td><td>&gt;</td><td>".$_SESSION['subject']."</td><td> &gt;&gt;</td><td>Qp ID: ".$_SESSION['qpid']."</td></tbody></table></div><br>";
			
			if(isset($_SESSION['qpfull'])&&$_SESSION['qpfull']=='no')
				echo "<script> alert('Question paper not filled, please fill up remaining ".$_SESSION['noq']." question(s)');</script>";
			?>
			<form name="qncreator">
			<div id="qncmain" name="qncmain">
			Qn type: <select name="qntype" id="qntype" onChange="qntypesetter();">
					<option>MCQ</option>
					<option>NUM</option>
				</select>
			
			<div id="qncounter">
				Qn no: <span class="cur"></span>  /	<span class="tot"></span>
			</div>
			
				<input type="hidden" name="stream" value="<?php echo $_POST['qpid'];?>"/>
				<input type="hidden" name="qpid" value="<?php echo $_SESSION['qpid'];?>"/>
				<input type="hidden" name="noq" value="<?php echo $_SESSION['noq'];?>"/>
				<input type="hidden" name="course" value="<?php echo $_SESSION['course'];?>"/>
				<input type="hidden" name="trade" value="<?php echo $_SESSION['trade'];?>"/>
				<input type="hidden" name="syllabus" value="<?php echo $_SESSION['syllabus'];?>"/>
				<input type="hidden" name="subject" value="<?php echo $_SESSION['subject'];?>"/>
			
				<br>
				Question: <br><textarea class="bdr-thm" name="qn" rows="10" cols="100"></textarea>
				<fieldset class="bdr-thm opt-fldset">
					<legend>Options</legend>
					Option 1: <input type="text" name="op1" size="50"/><br><br>
					Option 2: <input type="text" name="op2" size="50"/><br><br>
					Option 3: <input type="text" name="op3" size="50"/><br><br>
					Option 4: <input type="text" name="op4" size="50"/>		
				</fieldset>
				<br>
				Answer(s): 
				1<input type="checkbox" name="ans[]" value="1" />
				2<input type="checkbox" name="ans[]" value="2" />
				3<input type="checkbox" name="ans[]" value="3" />
				4<input type="checkbox" name="ans[]" value="4" />
				<br><br>
				Mark: <input type="text" name="mrk" size="5"/>
				<br><br>
				Negative Mark: <input type="text" name="negmrk" size="5" value="0"/>
				<br><br>
				<input class="button medbtn fltrt" type="button" name="submit" onClick="createqn()" value="+ Add" />
				</form>
			</div>
		</div>
		<script>
			var qno=1;
			var noq=document.forms["qncreator"]["noq"].value;
			
			var cnt = document.getElementById('qncounter');
			var cur = cnt.querySelector('.cur');
			var tot = cnt.querySelector('.tot');
			
			tot.innerHTML=noq;
			cur.innerHTML=qno;
			
		</script>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>