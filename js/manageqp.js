function updateqp(qp)
{
	document.forms.qpselect.qpid.value = qp.value;
	document.forms.qpselect.noq.value = qp.parentNode.parentNode.getElementsByTagName('td')[2].innerHTML;
	document.forms.qpselect.course.value = qp.parentNode.parentNode.getElementsByTagName('td')[3].innerHTML;
	document.forms.qpselect.trade.value = qp.parentNode.parentNode.getElementsByTagName('td')[4].innerHTML;
	document.forms.qpselect.syllabus.value = qp.parentNode.parentNode.getElementsByTagName('td')[5].innerHTML;
	document.forms.qpselect.subject.value = qp.parentNode.parentNode.getElementsByTagName('td')[6].innerHTML;

	document.forms.qpselect.submit();
}


function changestatus(qp,status)
{
	qpid = qp.value;
	/*document.forms["changeqpstatus"]["qpid"].value=qpid;
	document.forms["changeqpstatus"]["status"].value=status;
	*/
	var noq = qp.parentNode.parentNode.getElementsByTagName('td')[2].innerHTML;
	var url="backend/changeqpstatus.php";
	if(window.ActiveXObject)
		{
			req = new ActiveXObject(Microsoft.XMLHTTP);
		}
	else if(window.XMLHttpRequest)
		{
			req = new XMLHttpRequest();
		}
	req.onreadystatechange = function(){
		if(req.readyState==4)
		{
			if(req.responseText != 'FilluptheQnPaper')
				{
					qp.parentNode.innerHTML=req.responseText;
				}
			else
				{
					alert('Pls fill up all qns before you can activate the question paper');
				}
		}
	};
	req.open("post",url,true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send("qpid="+qpid+"&noq="+noq+"&status="+status);	
	//document.forms["changeqpstatus"].submit();
}