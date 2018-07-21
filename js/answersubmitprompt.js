function getfulqn(qid)
{
	qid = qid.innerHTML;
		var url="backend/fullqnfetcher.php";
	if(window.ActiveXObject)
		{
			req = new ActiveXObject(Microsoft.XMLHTTP);
		}
	else if(window.XMLHttpRequest)
		{
			req = new XMLHttpRequest();
		}
	req.onreadystatechange = function()
	{
		if(req.readyState==4)
		{
			document.getElementById('qn-body').innerHTML = req.responseText;
			MathJax.Hub.Queue(["Typeset",MathJax.Hub, "qn-body"]);
		}
	}
	req.open("post",url,true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send("qid="+qid);
}