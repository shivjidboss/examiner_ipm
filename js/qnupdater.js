var qno;
function get_qn()
{
	var qpid = document.forms.qnupdater.qpid.value;
	var qnid = document.forms.qnupdater.qnid.value;
	var url="backend/qnupdfetch.php";
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
	req.send("qpid="+qpid+"&qnid="+qnid);	
}
function qndisp()
{
	if(req.readyState==4)
		{
			document.getElementById('qncmain').innerHTML=req.responseText;
		}
}

function validate_qnupdater()
{
	var x1 = document.forms.qnupdater.qn.value;
	if (x1 == null || x1== "")
	  {
	  alert("Please enter the question");
	  return false;
	  }	
	  
	  
	var x2 = document.forms.qnupdater.op1.value;
	var x3 = document.forms.qnupdater.op2.value;
	var x4 = document.forms.qnupdater.op3.value;
	var x5 = document.forms.qnupdater.op4.value;
	if (x2 == null || x2== "" || x3 == null || x3== "" ||x4 == null || x4== "" ||x5 == null || x5== "" )
	  {
	  alert("Please fill in the options");
	  return false;
	  }	
	  
		
	var x6 = document.forms.qnupdater.mrk.value;
	if (x6 == null || x6 == "" || isNaN(x6))
	  {
	  alert("Please enter a valid number for mark");
	  return false;
	  }	 	
}
