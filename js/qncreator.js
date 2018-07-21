	
/*window.onbeforeunload = function(e) 
{
  var dialogText = "You haven't finished the question paper. Question paper can be activated only once it is finished";
  e.returnValue = dialogText;
  return dialogText;
};
*/	
function createqn()
{
	if(validate_qncreator())
	{
		var url="backend/qncreatorbckend.php";
		var qpid=document.forms.qncreator.qpid.value;
		var qntype=document.forms.qncreator.qntype.value;
		var course=document.forms.qncreator.course.value; 
		var trade=document.forms.qncreator.trade.value;
		var syllabus=document.forms.qncreator.syllabus.value;
		var subject=document.forms.qncreator.subject.value;
		
		var qn=encodeURIComponent(document.forms.qncreator.qn.value);
		var op1=encodeURIComponent(document.forms.qncreator.op1.value);
		var op2=encodeURIComponent(document.forms.qncreator.op2.value);
		var op3=encodeURIComponent(document.forms.qncreator.op3.value);
		var op4=encodeURIComponent(document.forms.qncreator.op4.value);
		var mrk=document.forms.qncreator.mrk.value;
		var negmrk=document.forms.qncreator.negmrk.value;
		
		var checkboxes = document.getElementsByName('ans[]');
		var vals = "";
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				vals += ","+checkboxes[i].value;
			}
		}
		if (vals) vals = vals.substring(1);
		
		reqparams="qpid="+qpid+"&qntype="+qntype+"&qn="+qn+"&op1="+op1+"&op2="+op2+"&op3="+op3+"&op4="+op4+"&ans="+vals+"&mrk="+mrk+"&negmrk="+negmrk+"&course="+course+"&trade="+trade+"&syllabus="+syllabus+"&subject="+subject;
		if(window.ActiveXObject)
			{
				req = new ActiveXObject(Microsoft.XMLHTTP);
			}
		else if(window.XMLHttpRequest)
			{
				req = new XMLHttpRequest();
			}
		req.onreadystatechange = (qno<noq)?clear:done;
		alert(reqparams);
		req.open("post",url,true);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.send(reqparams);
	}
}
function clear()
{
	if(req.readyState==4)
		{
			++qno;
			cur.innerHTML=qno;
			document.forms.qncreator.reset();
		}
}
function done()
{
	if(req.readyState==4)
		{
			document.getElementById('qncmain').innerHTML= "<div class='checkmark'></div><h1>Question Paper created</h1><br><a class='sdbarlinks' href='adminprofile.php'>Home</a>";
		}
}
	
	
function validate_qncreator()
{
	var qntype=document.forms.qncreator.qntype.value;
	var x1 = document.forms["qncreator"]["qn"].value;
	if (x1 == null || x1== "")
	  {
	  alert("Please enter the question");
	  return false;
	  }	
	  
	  
	var x2 = document.forms.qncreator.op1.value;
	var x3 = document.forms.qncreator.op2.value;
	var x4 = document.forms.qncreator.op3.value;
	var x5 = document.forms.qncreator.op4.value;
	if(qntype=="NUM")
		{
			if (x2 == null || x2== "")
			  {
			  alert("Please provide the correct answer");
			  return false;
			  }
		}
	else
		{
			if (x2 == null || x2== "" || x3 == null || x3== "" ||x4 == null || x4== "" ||x5 == null || x5== "" )
			  {
			  alert("Please fill in the options");
			  return false;
			  }
		}
	  
		
	var x6 = document.forms.qncreator.mrk.value;
	if (x6 == null || x6 == "" || isNaN(x6))
	  {
	  alert("Please enter a valid number for mark");
	  return false;
	  }	 	
	 return true;
}

function qntypesetter()
{
	var typ = document.getElementById('qntype');
	if(typ.value=='MCQ')
		{
			document.forms.qncreator.op2.disabled='';
			document.forms.qncreator.op3.disabled='';
			document.forms.qncreator.op4.disabled='';
		}
	if(typ.value=='NUM')
		{
			document.forms.qncreator.op2.disabled='true';
			document.forms.qncreator.op3.disabled='true';
			document.forms.qncreator.op4.disabled='true';
			document.forms.qncreator.ans.value="Option 1";
		}
}

function onlyoptme()
{
	var typ = document.getElementById('qntype');
	if(typ.value=='NUM')
		{
			if(document.forms.qncreator.ans.value!="Option 1")
				{
					alert("For nummeric answers only Option 1 is allowed");
					document.forms.qncreator.ans.value="Option 1";
				}
		}
}