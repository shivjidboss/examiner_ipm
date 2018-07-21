<?php

$qpid = $_POST['qpid'];
include ('mysqli_plug.php');
$query = "SELECT `qnid` from `qnsbank` WHERE `qnsbank`.`qpid` = '$qpid';";
$result=mysqli_query($db,$query);
while($temp=mysqli_fetch_array($result))
{
	$qnset[]=$temp['qnid'];
}
echo json_encode($qnset);

?>