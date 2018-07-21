<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
<script src="/ipm/js/qpviewer.js"></script>
<script type="text/javascript">
	function updateqn(qn)
	{
		var qnid = qn.value;
		document.forms["qnupdate"]["qnid"].value=qnid;
		document.forms["qnupdate"].submit();
	}
</script>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX","output/HTML-CSS"],
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="/ipm/js/MathJax/MathJax.js"></script>
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
	<div id= 'notification' class="cusscroll" >
	 <?php
		include("shownotification.php");
	?>	
	</div>
	<div id="leftpane">
		<?php include("adminsidebar.php");	?>
	</div>
	<div id="surface">
		<div id="body_card">
			<h3>Edit Question Paper</h3>
			<?php 
				
				$qpid = $_POST['qpid'];
				$course = $_POST['course'];
				$trade = $_POST['trade'];
				$syllabus = $_POST['syllabus'];
				$subject = $_POST['subject'];
				
				
				
				echo "<div id='qpdetails'><table><tbody><tr><td>".$_POST['course']."</td><td> &gt;</td><td>".$_POST['trade']."</td><td>&gt;</td><td>".$_POST['syllabus']."</td><td>&gt;</td><td>".$_POST['subject']."</td><td> &gt;&gt;</td><td>Qp ID: ".$qpid."</td></tbody></table></div><br>";
			
			$query="SELECT * FROM `ipm`.`qpbank` WHERE `qpid`='$qpid';";
			$result=mysqli_query($db,$query);
			$temp=mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
			
			<form name="qpdetails">
			<fieldset>
			Name: <input type="text" name="qpname" value="<?php echo $temp['qpname'];?>" />&emsp;
			No. of questions: <input type="text" name="noq" size="5" value="<?php echo $temp['noqs'];?>" />&emsp;
			Duration: <input type="text" name="dur" size="5" value="<?php echo $temp['dur'];?>" />mins&emsp;
			<input class="button smallbtn" type="button" value="Update" onClick="updateqpdet('<?php echo $qpid;?>');" />
			</fieldset>
			</form>
			<p id="updstatus" style="color:red;"></p>
			<div id="qpbody">
			<?php include ('backend/qpview.php'); ?>
			</div>
		</div>
	</div>
	<form name="qnupdate" method="post" action="qnupdater.php">
		<input type="hidden" name="qpid" value="<?php echo $_POST['qpid'];?>" />
		<input type="hidden" name="qnid" value="0" />
	</form>
</div>

<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>