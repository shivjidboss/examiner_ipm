var sub = 0;
window.onbeforeunload=function(e)
{
	if(sub != 1)
		{
			if(document.getElementById('rand').value == 0)
			{
			var td = JSON.stringify(testdata);
			var rview = JSON.stringify(forreview);
			var qpid = document.getElementById('qpid').value;
			var noq = document.getElementById('noq').value;
			var url="/ipm/submitsummary.php";
			if(window.ActiveXObject)
				{
					req = new ActiveXObject(Microsoft.XMLHTTP);
				}
			else if(window.XMLHttpRequest)
				{
					req = new XMLHttpRequest();
				}
			req.open("post",url,true);
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.send("qpid="+qpid+"&noq="+noq+"&uans="+td+"&forreview="+rview);
			 var dialogText = "Answers being submitted";
			  e.returnValue = dialogText;
			  return dialogText;
			}
		}
	
};
var qnset = []; var qnsetencoded;

function get_qnset(r)
{
	var qpid = document.getElementById('qpid').value;
	if(r=='1')
		var url="backend/randomsubject.php";
	else if(r=='2')
		var url="backend/practisetest.php";
	else
		var url="backend/qnsetfetcher.php";
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
			if(req.responseText=="Questions not tally!")
				{
					window.location="subjectselect.php";
				}					
			else
			qnsetencoded = req.responseText;
			qnset = JSON.parse(qnsetencoded);
			get_qn(0);
		}
	}
	req.open("post",url,true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send("qpid="+qpid);
}


var qno; var noq;
var testdata=[];
var forreview=[];
	
function anstoobj(v)
{
	var newdata=-1;
	var qpid = document.getElementById('qpid').value;
	var qnid = document.getElementById('qnid').value;
	
	var checkboxes = document.getElementsByName('qnopt[]');
	var vals = "";
	if(checkboxes.length==1)
	{
		vals = '>,'+checkboxes[0].value;
	}
	else
	{
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				vals += ","+checkboxes[i].value;
			}
		}
		if (vals) vals = vals.substring(1);
	}
	
	
	var uans = vals;
	for(var i=0;i<testdata.length;i++)
	{
		if(qnid==testdata[i].qnid)
		{
			newdata=i;
			if(uans!=testdata[i].uans)
				testdata[i].uans=uans;
		}
	}
	if(newdata==-1 && uans!="")
	{
		var obj = new Object();
		obj.qnid = qnid;
		obj.uans = uans;
		testdata.push(obj);
		/*
		console.log("anstoobj > "+v);
		console.log("Pushing to testdata:");
		console.log(obj);
		console.log("testdata.length = "+testdata.length);
		console.log("noq = "+noq+"  qno = "+qno);*/
	}
	newdata=-1;
	for(var i=0;i<forreview.length;i++)
	{
		if(qnid==forreview[i].qnid)newdata=i;
	}
	if(newdata==-1)
	{
		if(document.getElementById('reviewme').checked)
		{
			var obj = new Object();
			obj.qnid = qnid;
			forreview.push(obj);
			/*
			console.log("anstoobj > "+v);
			console.log("Pushing to forreview:");
			console.log(obj);
			console.log("forreview.length = "+forreview.length);
			console.log("noq = "+noq+"  qno = "+qno);*/
		}
	}
	else
	{
		if(!document.getElementById('reviewme').checked)
		{
			forreview.splice(newdata,1);
			/*
			console.log("anstoobj > "+v);
			console.log("After splice: forreview = ");
			console.log(forreview);
			console.log("forreview.length = "+forreview.length);
			console.log("noq = "+noq+"  qno = "+qno);*/
		}
	}
	get_qn(v);
}

function anstoobjforrview(v)
{
	var newdata=-1;
	var qpid = document.getElementById('qpid').value;
	var qnid = document.getElementById('qnid').value;
	
	var checkboxes = document.getElementsByName('qnopt[]');
	var vals = "";
	if(checkboxes.length==1)
	{
		vals = '>,'+checkboxes[0].value;
	}
	else
	{
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				vals += ","+checkboxes[i].value;
			}
		}
		if (vals) vals = vals.substring(1);
	}
	
	var uans = vals;
	for(var i=0;i<testdata.length;i++)
	{
		if(qnid==testdata[i].qnid)
		{
			newdata=i;
			if(uans!=testdata[i].uans)
				testdata[i].uans=uans;
		}
	}
	if(newdata==-1 && uans!="")
	{
		var obj = new Object();
		obj.qnid = qnid;
		obj.uans = uans;
		testdata.push(obj);
		/*
		console.log("anstoobjforrview > "+v);
		console.log("Pushing to testdata:");
		console.log(obj);
		console.log("testdata.length = "+testdata.length);
		console.log("noq = "+noq+"  qno = "+qno);*/
		
	}
	get_reviewqns(v);
}
	
function get_qn(q)
{
	var qpid = document.getElementById('qpid').value;
	noq = document.getElementById('noq').value;
	qno = q;
	if(q === undefined)		
	{
		qno = 0; q = 0;
	}
	else if(q == (noq))
	{
		if(forreview.length>0)
		{
			noq = forreview.length;
			return get_reviewqns(0);
		}
		else
		{
			var td = JSON.stringify(testdata);
			document.getElementById('uans').value=td;
			sub =1;
			document.forms["tosubmitsummary"].submit();
		}
		
	}
	if((qno>=0)&&(qno<noq))
	{
		qnid = qnset[qno];
		var url="backend/qnfetcher.php";
		if(window.ActiveXObject)
			{
				req = new ActiveXObject(Microsoft.XMLHTTP);
			}
		else if(window.XMLHttpRequest)
			{
				req = new XMLHttpRequest();
			}
		req.onreadystatechange = qndisp(q);
		req.open("post",url,true);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.send("qnid="+qnid+"&rview=yes");	
	}
}
	

function get_reviewqns(q)
{
	var qpid = document.getElementById('qpid').value;
	qno = q;
	if(q === undefined)		
	{
		qno = 0; q = 0;
	}
	else if(q == (noq))
	{
		var td = JSON.stringify(testdata);
		document.getElementById('uans').value=td;
		sub =1;
		document.forms["tosubmitsummary"].submit();
	}
	if((qno>=0)&&(qno<noq))
	{
		qnid = forreview[qno].qnid;
		var url="backend/qnfetcher.php";
		if(window.ActiveXObject)
			{
				req = new ActiveXObject(Microsoft.XMLHTTP);
			}
		else if(window.XMLHttpRequest)
			{
				req = new XMLHttpRequest();
			}
		req.onreadystatechange = qndisp_rview(q);
		req.open("post",url,true);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.send("qnid="+qnid+"&qpid="+qpid);	
	}
}

function qndisp(q)
{
	return function() 
	{	
		if(req.readyState==4)
			{
				cur.innerHTML="Qn no. "+(qno+1);
				document.getElementById('qn-body').innerHTML=req.responseText;

				MathJax.Hub.Queue(["Typeset",MathJax.Hub, "qn-body"]);
				noq = document.getElementById('noq').value;
				if(q<=0)
					document.getElementById('previous').disabled=true;
				else
					document.getElementById('previous').disabled=false;

				if(q>=(noq-1))
					document.getElementById('next').value="Submit";
				else
					document.getElementById('next').value=">> Next";

				var qnid = document.getElementById('qnid').value;
				if(testdata)
				{
					
					/*console.log("Reading: testdata = ");
					console.log(testdata);
					console.log("testdata.length = "+testdata.length);*/
					
					
					for(var i=0;i<testdata.length;i++)
					{
						if(qnid==testdata[i].qnid && testdata[i].uans!="")
						{
							var checkboxes = document.getElementsByName('qnopt[]');
							var temp = testdata[i].uans.split(",");
							if(temp[0]=='>')
								checkboxes[0].value = temp[1];
							else
							{
								for(var j=0;j<temp.length;j++)
								{
									checkboxes[temp[j]-1].checked = true;
								}
							}
						}
					}
				}
				if(forreview)
				{
					
					/*console.log("Reading: forreview = ");
					console.log(forreview);
					console.log("forreview.length = "+forreview.length);*/
					
					
					for(var i=0;i<forreview.length;i++)
					{
						if(qnid==forreview[i].qnid)
						{
							document.getElementById('reviewme').checked=true;
						}
					}
				}
			}
	}
}

function qndisp_rview(q)
{
	return function() 
	{	
		if(req.readyState==4)
			{
				noq = forreview.length;
				cur.innerHTML= "Review Question: "+(qno+1);
				tot.innerHTML=noq;
				document.getElementById('qnaireformctrls').innerHTML="<input type='button' id='previous' class='button smallbtn previous' value='Previous' onClick='anstoobjforrview(qno-1)' /><input type='button' id='next' class='button smallbtn next' value='>> Next' onClick='anstoobjforrview(qno+1)' />";
				document.getElementById('qn-body').innerHTML=req.responseText;
				MathJax.Hub.Queue(["Typeset",MathJax.Hub, "qn-body"]);
				
				if(q<=0)
					document.getElementById('previous').disabled=true;
				else
					document.getElementById('previous').disabled=false;

				if(q>=(noq-1))
					document.getElementById('next').value="Submit";
				else
					document.getElementById('next').value=">> Next";

				var qnid = document.getElementById('qnid').value;
				if(testdata)
				{
					
					/*console.log("Reading: testdata = ");
					console.log(testdata);
					console.log("testdata.length = "+testdata.length);*/
					
					
					for(var i=0;i<testdata.length;i++)
					{
						if(qnid==testdata[i].qnid && testdata[i].uans!="")
						{
							var checkboxes = document.getElementsByName('qnopt[]');
							var temp = testdata[i].uans.split(",");
							if(temp[0]=='>')
								checkboxes[0].value = temp[1];
							else
							{
								for(var j=0;j<temp.length;j++)
								{
									checkboxes[temp[j]-1].checked = true;
								}
							}
						}
					}
				}
			}
	}
}