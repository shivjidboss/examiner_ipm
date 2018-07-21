<!doctype html>
<html>
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
<script src="/ipm/js/answersubmitprompt.js"></script>
 
<?php session_start(); ?>  
</head>

<body>
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
	<div id= 'notification' class="cusscroll" >
	<?php
		include("shownotification.php");
	?>	
	</div>
	<div id="leftpane">
		<div id="mini_prof">
			<a class="sdbarlinks" href="profile.php"> Home Page</a><br>
			<a class="sdbarlinks" href="subjectselect.php">Take Test</a><br>
			<a class="sdbarlinks" href="logout.php">Logout</a><br>
		</div>
	</div>
	<div id="surface">
		<div id="body_card">
			<h2>Question Paper completed</h2>
			<h3>Congratulations!</h3>
			<div class="checkmark"></div>
			<table class="tbl">
				<tr class="tbl_head">
					<td>QP Id</td>
					<td>Total qns</td>
					<td>Appeared</td>
					<td>Correct</td>
					<td>Total Marks</td>
					<td>Marks Scored</td>
				</tr>
				<tr>
					<td><center><?php if($_COOKIE['qpid']!='RandomQP')echo($_COOKIE['qpid']);else echo "RandomQP";?></center></td>
					<td><center><?php echo($_COOKIE['tqns']);?></center></td>
					<td><center><?php echo($_COOKIE['ansrd']);?></center></td>
					<td><center><?php echo($_COOKIE['correct']);?></center></td>
					<td><center><?php echo($_COOKIE['qmark']);?></center></td>
					<td><center><?php echo($_COOKIE['mark']);?></center></td>
				</tr>	
			</table>
			<br>
			<h3>Answer details</h3>
			<div id="qn-body" style="background: beige;padding: 25px; min-height: 75px;overflow: scroll;">
					<!-- Question body here -->
					<br><br>Click on Qn ID from table below to view the question
			</div><br>
			<?php $anslist=json_decode($_COOKIE['anslist']); ?>
			<table class="tbl">
			<tr class="tbl_head"><td>Qn ID</td><td>Ans</td><td>Mark</td></tr>
			<?php 
			for($i=0;$i<sizeof($anslist);$i++)
			{
				$anslist[$i]=json_decode($anslist[$i]);
				echo"<tr><td onclick=getfulqn(this); style='cursor: pointer;'>".$anslist[$i]->qnid."</td><td ".$anslist[$i]->corr."</td><td>".$anslist[$i]->mrk."</td></tr>";
			}
			?>
			
			</table>
			<?php
				unset($_COOKIE['qpid']);
				unset($_COOKIE['ansrd']);
				unset($_COOKIE['tqns']);
				unset($_COOKIE['correct']);
				unset($_COOKIE['mark']);
				unset($_COOKIE['qmark']);
				unset($_COOKIE['anslist']);
			?>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>