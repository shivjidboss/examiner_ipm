<a href="javascript:remvelem('notification');" title="Close"><div class="closeme"></div></a>
<?php
include ('backend/mysqli_plug.php');
$query="SELECT * from `ipm`.`notification` WHERE `enable` = '1' ORDER BY `time` DESC;";
$result=mysqli_query($db,$query);
$rows=0;
if($result) $rows = mysqli_num_rows($result);
if($rows !=0)
	{
		while($temp=mysqli_fetch_array($result))
		{
			/*if($temp['enable']==1)
			{ */
			  echo "<h4>Subject:".$temp['subject']."</h4>";
			  echo "<h5>Message: ".$temp['message']."</h5>";
			  echo "<h5>".$temp['time']."</h5><hr>";
			//}
		}
	}
else
	echo("<br><br>No Notifications to display!");
?>