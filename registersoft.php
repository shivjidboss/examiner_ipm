
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IPM Academy</title>

<link rel="shortcut icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link rel="icon" href="/ipm/resources/favicon.png" type="image/x-icon">
<link href="/ipm/css/main.css" type="text/css" rel="stylesheet" />
<script src="/ipm/js/bgprocess.js"></script>
 
<link href="/ipm/css/welcome.css" type="text/css" rel="stylesheet" />
	<script>

		function contactadmin()
			{
				window.location.reload();
				alert("Please conact T2P team to register!");
				//for(;;){};
			}
	
	</script>
</head>

<body>
<div id="mainlogo"></div>
<div id="loginegg">
	<div id="login">
			<form name="register" action="backend/registersoftbackend.php" method="post">
			<h3>Register</h3>
				<table id="login_tabl">
					<tr>
						<td>
   							<td><textarea rows="2" cols="40" name="url" value="" class="bg2none" style="background-color:#fff;"></textarea></td>
   						</td>
					</tr>
					<tr>
						<td></td>
						<td>
    						<input class="submit" type="submit" name="submit" value="Register">
    					</td>
    				</tr>
    				<tr>
    					<td></td>
						<td>
							<button class="nobutton" type="button" onClick="contactadmin()">How To Register?</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
<div id="calladmin"></div>
<div id="adminlink"><a class="sdbarlinks" href="adminlogin.php">Admin Login</a><br></div>
<div id="footer">
Developed by T2P - Copyright © 2017
</div>
</body>
</html>

