<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>
<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
</head>

<body>

<?php
$qpid = $_POST['qpid'];	
$uans = $_POST['uans'];	
$noq = $_POST['noq'];
$rand = $_POST['rand'];
$uansd = json_decode($_POST['uans']);	
$forreview = json_decode($_POST['forreview'])	
?>

<table name="testsummary">
<tr>
    <td>Qd id:</td>
	<td><?php echo $_POST['qpid']; ?></td>
</tr>
	<tr>
		<td>Number of questions answered</td>
		<td><?php echo sizeof($uansd); ?></td>
	</tr>
	<tr>
		<td>Number of questions marked for review</td>
		<td><?php echo sizeof($forreview); ?></td>
	</tr>
</table>

<?php 
include ('backend/submitsummarybackend.php');	
?>




</body>
</html>