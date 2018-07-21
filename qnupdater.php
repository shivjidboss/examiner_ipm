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
<script src="/ipm/js/qnupdater.js"></script>
<?php session_start(); ?>  
</head>
<body onload="get_qn();">

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
			<form name="qnupdater" onsubmit="return validate_qnupdater();" method="post" action="backend/qnupdatebckend.php">
				<input type="hidden" name="stream" value="exampl"/>
				<input type="hidden" name="qpid" value="<?php echo $_POST['qpid'];?>"/>
				<input type="hidden" name="qnid" value="<?php echo $_POST['qnid'];?>"/>
				<div id="qncmain" name="qncmain">
				<!-- qn updater form here -->
				</div>
					<input type="submit" class="button medbtn fltrt" value="Update" />
			</form>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>