<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<link href="/ipm/css/signup.css" type="text/css" rel="stylesheet" />		
<script type="text/javascript" src="/ipm/js/html5.image.preview.js"></script>
<?php
session_start(); 
$password = $_POST["password"];
include ('backend/mysqli_plug.php');
$userid = $_SESSION['userid'];
$query ="SELECT * FROM `admin_det` WHERE userid = '$userid' AND password = '$password';";

	$result=mysqli_query($db,$query);
	$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if ($result)
	{
		$username = $_POST["userid"];
		
		$query = "SELECT * FROM `ipm`.`user_det` WHERE `user_det`.`username` = '$username';";
		$result=mysqli_query($db,$query);
		if(mysqli_num_rows($result)>0)
		{
			$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$username = $result['username'];
			$name = $result['name'];
			$email = $result['email'];
			$phone = $result['phone'];
			$dob = $result['dob'];
			$gend = $result['sex'];	
			$addr = $result['addr'];	
			$institute = $result['institute'];	
			$imgid = $result['imgid'];
		}
		else echo"<script>window.onload=function(){document.getElementById('signupform').innerHTML='<h2 style=".'color:red;'.">Student not found!</h2><h4>Check the userid and try again</h4>';}</script>";
	
	}
		
	
	else
	 {	setcookie("authenpass","wrong",0,'/',NULL);
	 	header("Location:edituser.php");
		echo("Wrong Password");
	 }
?>
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
			<div id="signupform">
				<font color="#333333" face="Tahoma, Geneva, sans-serif"><h3>Edit Student</h3>
					<form name="signup" action="backend/edituser.php" method="post" enctype="multipart/form-data">
						<table id="signup_tble">
							<tr>
								<td>User Id</td>
								<td><?php echo($username);?><input type="hidden" name="username" value="<?php echo($username);?>" /></td>
							</tr>
							<tr>
								<td>Name</td>
								<td><input type="text" name="name" value="<?php echo($name);?>" spellcheck="false"  /></td>
							</tr>
							<tr>
								<td>D.O.B</td>
								<td><input type="date" name="dob" value="<?php echo($dob);?>" /></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><input type="text" name="phone" value="<?php echo($phone);?>" autocomplete="off"/></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="email" name="email" value="<?php echo($email);?>" spellcheck="false" autocomplete="off" /></td>
							</tr>
							<tr>
							 <?php 
								if($gend=='f') 
								   echo("<td>Sex </td><td>Female<input type='radio' name='gend' value='f' checked='checked'/>
									 Male<input type='radio' name='gend' value='m'/></td>");
								 else
									 echo("<td>Sex </td><td>Female<input type='radio' name='gend' value='f'/>
									 Male<input type='radio' name='gend' value='m' checked='checked' /></td>");
							?>	      	 	 
							</tr>
							<tr>
							  <td>Address</td>
							  <td><textarea name="addr" cols="30" rows="5" id="address" spellcheck="false" class="bgnone"><?php echo($addr);?></textarea>
							  </td>
							</tr>
							<tr>
								<td>Institution</td>
								<td><input name="institute" type="text" size="35" value="<?php echo($institute);?>"></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" name="submit" value="Submit" class="submit" /></center></td>
							</tr>
						</table>
						<div id="propicupload">  
							<input type="file" name="imgfile" onchange="previewImage(this,[220],20);" /><br><br>
							<div style="height:220px; width:220px" class="imagePreview">
								<img src="<?php if($imgid!='noimgid') echo '/ipm/resources/uploads/imgid/' . $imgid; ?>" width="220" class="pro-pic" title="Image preview 220px">
							</div>
						</div>
						<input type="hidden" name="imgset" value="<?php if($imgid!='noimgid') echo 'yes'; else echo 'no'; ?>" />
					</form>  
				</font> 
			</div>
		</div>
	</div>
</div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>