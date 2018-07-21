<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<script type="text/javascript">
	function taketest(qp)
	{
		var qpid = qp.value;
		var noq = qp.parentNode.parentNode.getElementsByTagName('td')[2].innerHTML;
		var dur = qp.parentNode.parentNode.getElementsByTagName('td')[3].innerHTML;
		document.forms["qpselect"]["qpid"].value=qpid;
		document.forms["qpselect"]["noq"].value=noq;
		document.forms["qpselect"]["dur"].value=dur;
		//document.forms["qpselect"]["rand"].value="";
		document.forms["qpselect"].submit();
	}
	function takerandtest(qp)
	{
		var qpid = qp.value;
		var noq = qp.parentNode.parentNode.getElementsByTagName('td')[1].innerHTML;
		var dur = qp.parentNode.parentNode.getElementsByTagName('td')[2].innerHTML;
		document.forms["qpselect"]["qpid"].value=qpid;
		document.forms["qpselect"]["noq"].value=noq;
		document.forms["qpselect"]["dur"].value=dur;
		document.forms["qpselect"]["rand"].value="1";
		document.forms["qpselect"].submit();
	}
</script>
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
	
		<?php
			include ('backend/mysqli_plug.php');
			$course = $_SESSION['course'];
			$trade = $_SESSION['trade'];
			$syllabus = $_SESSION['syllabus'];
			$subject = $_COOKIE['subject'];
			$query="SELECT * from `ipm`.`qpbank` where course='$course' AND trade='$trade' AND syllabus='$syllabus' AND subject='$subject' AND status= '1';";
			$result=mysqli_query($db,$query);
				

				
				
			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;

			$path=$_SESSION['course']."/".$_SESSION['trade']."/".$_SESSION['syllabus']."/".$_SESSION['userid'].".xml";
			$path='usertest_details/'.$path;
			$dom->load($path);
			$dom->formatOutput = true;
			/*$question = $dom->getElementsByTagName('question');
			for($i=0;$i<sizeof($question);$i++)*/
		?>
		<div id="body_card">
			<h3>Select Question paper</h3>
			<table class="tbl">
			<tr class="tbl_head">
				<td>QP Id</td>
				<td>QP Name</td>
				<td>No. of qns</td>
				<td>Duration</td>
				<td>-ve marking</td>
				<td>Link</td>
			</tr>
			<?php
			$rows=0;
			if($result) $rows = mysqli_num_rows($result);
			if($rows !=0)
				{
					while($temp=mysqli_fetch_array($result))
					{
					  if($temp['status']==1)	
					   {
						 echo "<tr><td>".$temp['qpid']."</td>";
						echo "<td>".$temp['qpname']."</td>";
						echo "<td>".$temp['noqs']."</td>";
						echo "<td>".$temp['dur']."</td>";
						if($temp['negate']==1)echo "<td>Yes</td>"; else echo "<td>No</td>";
						$hit=0;
						
						foreach($dom->getElementsByTagName('answer') as $answer)
						{
							$qpid = $answer->childNodes[0]->nodeValue;
							if($qpid==$temp['qpid'])
							 $hit=1;
						}
						
						if($hit==0)
						{	
							echo "<td><button class='button smallbtn' name='test' type='button' value='".$temp['qpid']."' onclick='taketest(this)'>Take test</button>";
							$hit=0;
						}
						
						else
							echo "<td><center><font color='#E8171A'face='Tahoma, Geneva, sans-serif'>Taken</font></center></td>";
					   }
					 }
				}
				else echo"<tr><td colspan='6'>No question papers available</td></tr>";
			?>
			</table>
			<form name="qpselect" method="post" action="qnaireui.php">
				<input type="hidden" name="qpid" value="0" />
				<input type="hidden" name="noq" value="0" />
				<input type="hidden" name="dur" value="0" />
				<input type="hidden" name="rand" value="0" />
			</form>
				
			<?php
				
				$course = $_COOKIE['course'];
				$trade = $_COOKIE['trade'];
				$syllabus = $_COOKIE['syllabus'];
				$subject = $_COOKIE['subject'];
					
				
				$query = "SELECT * FROM `ipm`.`random_sub` WHERE `course`= '$course' AND `trade`= '$trade' AND  `syllabus`= '$syllabus' AND  `subject`='$subject';";
				$result = mysqli_query($db,$query);
				
				if($result)
				{
					if(mysqli_num_rows($result)>0)
					{
						$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
						if($result['active']==1)
						echo("<br><br><table class='tbl'>
						<tr class='tbl_head'>
							<td>QP Name</td>
							<td>No. of qns</td>
							<td>Duration</td>
							<td>-ve marking</td>
							<td>Link</td>
						</tr>
						<tr>
							<td>Random Questions</td>
							<td>".$result['noq']."</td>
							<td>".$result['duration']."</td>
							<td>Might</td>
							<td><button class='button smallbtn' name='test' type='button' value='".$temp['qpid']."' onclick='takerandtest(this)'>Take test</button></td>
						</tr>
						</table>");
					}
					
				}
			
			?>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>