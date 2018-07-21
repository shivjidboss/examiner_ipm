<html>
<head>
<title>Cookie Setter</title>
<script type="text/javascript">	
	function setcke()
	{
		var n = document.getElementById('name').value;
		var v = document.getElementById('val').value;
		var url="/ipm/backend/devtools/cookie_setter.php";
		if(window.ActiveXObject)
			{
				req = new ActiveXObject(Microsoft.XMLHTTP);
			}
		else if(window.XMLHttpRequest)
			{
				req = new XMLHttpRequest();
			}
		req.onreadystatechange = qndisp;
		req.open("post",url,true);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.send("name="+n+"&value="+v);	
	}
	function qndisp()
	{
		if(req.readyState==4)
			{
				document.getElementById('opbox').innerHTML=req.responseText;
				document.getElementById('name').value="";
				document.getElementById('val').value="";
			}
	}
</script>
</head>
<body>
<h2>Cookie Setter</h2>
<hr>
Cookie name: <input type='text' name='name' id='name'/><br><br>
Value: <input type='text' name='val' id='val'/><br><br>
<button type='button' onclick='setcke()'>Add Cookie</button>
<p id='opbox'></p>
</body>
</html>