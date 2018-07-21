<!doctype html>
<html>
<?php
	session_start();
?>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX","output/HTML-CSS"],
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="/ipm/js/MathJax/MathJax.js"></script>
<script src="/ipm/js/qnaireui.js"></script>
</head>

<body onLoad="get_qnset(<?php if(isset($_POST['rand']))echo $_POST['rand']; ?>)">

<div id="topbar">
	<div id="mainlogo"></div>
	<div id="tpbarright">
		<div id="tpbartxt">
				<?php
					
					if(isset($_SESSION['userid']))	
						echo ("USERID: ".$_SESSION['userid']);
					else	
						header("Location:welcome.php");
					echo "<br><br>Name: ".$_COOKIE['name'];
					echo("<a class='button logout' href='logout.php'>Logout</a>");
				?>
		
		<div class="gendicon <?php echo (($_COOKIE['sex']=='m')? 'male' : 'female'); ?>">
			<?php if($_COOKIE['imgid'] != "noimgid")
				{
					echo "<img src='/ipm/resources/uploads/imgid/" . $_COOKIE['imgid'] ."' style='height:100px; width:100px'>"; 
				}
			?>
		</div>
		</div>
	</div>	
</div>
<div id="main">
	<input type="hidden" id="dur" name="dur" value="<?php echo $_POST['dur']; ?>" />
	<div id="leftpane">
		<div id="mini_prof">
			<a class="sdbarlinks" href="profile.php"> Home Page</a><br>
			<a class="sdbarlinks" href="subjectselect.php">Take Test</a><br>
			<a class="sdbarlinks" href="logout.php">Logout</a><br>
		</div>
	</div>
	<div id="surface">
		<div id="body_card">
			<?php 
				
				echo "<div id='qpdetails'><table><tbody><tr><td>".$_COOKIE['course']."</td><td> &gt;</td><td>".$_COOKIE['trade']."</td><td>&gt;</td><td>".$_COOKIE['syllabus']."</td>";
				if(isset($_POST['rand']))
				{
					if($_POST['rand']==1)
						echo "<td>&gt;</td><td>Qp ID: Random QP</td></tr></tbody></table></div><br>";
					else if($_POST['rand']==2)
						echo "<td>&gt;</td><td>Qp ID: Practise Test</td></tr></tbody></table></div><br>";
					else
						echo "<td>&gt;</td><td>".$_COOKIE['subject']."</td><td> &gt;&gt;</td><td>Qp ID: ".$_POST['qpid']."</td></tr></tbody></table></div><br>";
				}
					
				else
					echo "<td>&gt;</td><td>".$_COOKIE['subject']."</td><td> &gt;&gt;</td><td>Qp ID: ".$_POST['qpid']."</td></tr></tbody></table></div><br>";
			?>
			<div id="qncounter">
				<span class="cur"></span>/	<span class="tot"></span>
			</div>
				<form name="qnaire">
					<div id="qn-body">
					<!-- Question body here -->
					</div>
				</form>


				<br>
				<div id="qnaireformctrls">
					<input type="button" id="previous" class="button smallbtn previous" value="Previous" onClick="anstoobj(qno-1)" />
					<input type="button" id="next" class="button smallbtn next" value=">> Next" onClick="anstoobj(qno+1)" />
				</div>
		</div>
		<form name="tosubmitsummary" method="post" action="submitsummary.php">
			<input type="hidden" id="qpid" name="qpid" value="<?php echo $_POST['qpid']; ?>" />
			<input type="hidden" id="noq" name="noq" value="<?php echo $_POST['noq']; ?>" />
			<input type="hidden" id="uans" name="uans" value="" />
			<input type="hidden" id="forreview" name="forreview" value="" />
			<input type="hidden" id="rand" name="rand" value="<?php if(isset($_POST['rand']))echo $_POST['rand']; ?>" />
		</form>
		<script>
			var qno=0;
			var noq=document.forms["tosubmitsummary"]["noq"].value;
			
			var cnt = document.getElementById('qncounter');
			var cur = cnt.querySelector('.cur');
			var tot = cnt.querySelector('.tot');
			
			tot.innerHTML=noq;
			cur.innerHTML=qno+1;
		</script>
	</div>
	<div id="rightpane">
		<div id="testrtpanel">
			
			
		  <div id="clockdiv">
			  <div>
				<span class="hours"></span>
				<div class="smalltext">Hrs</div>
			  </div>
			  <div>
				<span class="minutes"></span>
				<div class="smalltext">Mins</div>
			  </div>
			  <div>
				<span class="seconds"></span>
				<div class="smalltext">Secs</div>
			  </div>
			</div>
			<script src="js/timer.js"></script>
		</div>
	</div>
</div>
</body>
</html>