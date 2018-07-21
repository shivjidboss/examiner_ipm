<?php

$qid = $_POST['qid'];
include ('mysqli_plug.php');
$query = "SELECT `qntxt` from `qnsbank` WHERE `qnsbank`.`qnid` = '$qid';";
$result=mysqli_query($db,$query);
$temp=mysqli_fetch_array($result,MYSQLI_ASSOC);

echo "<div style='
    height: 25px;
    background: #ffeac4;
    padding-top: 2px;
    padding-left: 10px;
    width: 174px; 
	position: relative;
    top: -8px;
'>QnID: ".$qid."</div><hr>".$temp['qntxt'];


?>