function fetch_course()
{
var usr;
//var course=document.forms.managecourse.course.value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  usr=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  usr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
usr.onreadystatechange=function ()
  {
  if (usr.readyState==4 && usr.status==200)
    {
    document.getElementById("course").innerHTML=usr.responseText;
	document.getElementById('courseinpt').value = "";
	document.getElementById('tradeinpt').value = "";
	document.getElementById('syllabusinpt').value = "";
	document.getElementById('subjectinpt').value = "";
	fetch_trade(1);
	fetch_syllabus(1);
	fetch_subject(1);
	}
  }
  
usr.open("POST","backend/managecourseajax.php",true);
usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
usr.send();
}	
	
function fetch_trade(t)
{
	if(t==1)
	{
		document.getElementById("trade").innerHTML="<option disabled selected value> -- Select Trade -- </option>";
		return;
	}
	var usr;
	var course=document.forms.managecourse.course.value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  usr=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  usr=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	usr.onreadystatechange=function ()
	  {
	  if (usr.readyState==4 && usr.status==200)
		{
		document.getElementById("trade").innerHTML=usr.responseText;
		document.getElementById('courseinpt').value = "";
		document.getElementById('tradeinpt').value = "";
		document.getElementById('syllabusinpt').value = "";
		document.getElementById('subjectinpt').value = "";
		fetch_syllabus(1);
		fetch_subject(1);
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send("course="+course);
}
	
function fetch_syllabus(t)
{
	if(t==1)
	{
		document.getElementById("syllabus").innerHTML="<option disabled selected value> -- Select Syllabus -- </option>";
		return;
	}
	var usr;
	var course= document.forms.managecourse.course.value;
	var trade=document.forms.managecourse.trade.value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  usr=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  usr=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	usr.onreadystatechange=function ()
	  {
	  if (usr.readyState==4 && usr.status==200)
		{
		document.getElementById("syllabus").innerHTML=usr.responseText;
		document.getElementById('courseinpt').value = "";
		document.getElementById('tradeinpt').value = "";
		document.getElementById('syllabusinpt').value = "";
		document.getElementById('subjectinpt').value = "";
		fetch_subject(1);
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course);

}	
	
function fetch_subject(t)
{
	if(t==1)
	{
		document.getElementById("subject").innerHTML="<option disabled selected value> -- Select Subject -- </option>";
		return;
	}
	var usr;
	var course= document.forms.managecourse.course.value;
	var trade=document.forms.managecourse.trade.value;
	var syllabus=document.forms.managecourse.syllabus.value;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  usr=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  usr=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	usr.onreadystatechange=function ()
	  {
	  if (usr.readyState==4 && usr.status==200)
		{
		document.getElementById("subject").innerHTML=usr.responseText;
		document.getElementById('courseinpt').value = "";
		document.getElementById('tradeinpt').value = "";
		document.getElementById('syllabusinpt').value = "";
		document.getElementById('subjectinpt').value = "";
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course+"& syllabus="+syllabus);

}		
	
//Add course
function addcoursedetls(v)
{
	var c;
	var course= document.forms.managecourse.course.value;
	var trade = document.forms.managecourse.trade.value;
	var syllabus = document.forms.managecourse.syllabus.value;
	var subject = document.forms.managecourse.subject.value;
	if(v==1)
	{
		c=document.getElementById('courseinpt').value;
		if(c==""||c==undefined)
			{
				alert('Enter the course name');
				return false;
			}
		var r = confirm("Create course: "+c+" ?");
		if (r == true) 
		{
			var reqparams = "course="+c;
		} 
		else 
		{
			return false;
		}
		
		
	}
	if(v==2)
	{
		if(course!="")
		{
			c=document.getElementById('tradeinpt').value;
			if(c==""||c==undefined)
				{
					alert('Enter the trade name');
					return false;
				}
			var r = confirm("Create trade: "+c+" under "+course+"?");
			if (r == true) 
			{
				var reqparams = "course="+course+"& trade="+c;
			} 
			else 
			{
				return false;
			}
		}
		else
		{
			alert("Plaese select a course");
			return false;
		}
	}
	if(v==3)
	{
		if(course!="" && trade!="")
		{
			c=document.getElementById('syllabusinpt').value;
			if(c==""||c==undefined)
				{
					alert('Enter the syllabus name');
					return false;
				}
			var r = confirm("Create syllabus: "+c+" under "+course+", "+trade+" ?");
			if (r == true) 
			{
				var reqparams = "course="+course+"& trade="+trade+"& syllabus="+c;
			} 
			else 
			{
				return false;
			}
		}
		else
		{
			alert("Please select a trade");
			return false;
		}
	}
	if(v==4)
	{
		if(course!="" && trade!="" && syllabus!="")
		{
			c=document.getElementById('subjectinpt').value;
			if(c==""||c==undefined)
				{
					alert('Enter the subject name');
					return false;
				}
			var r = confirm("Create subject: "+c+" under "+course+", "+trade+", "+syllabus+" ?");
			if (r == true) 
			{
				var reqparams = "course="+course+"& trade="+trade+"& syllabus="+syllabus+"& subject="+c;
			} 
			else 
			{
				return false;
			}
		}
		else
		{
			alert("Please select a syllabus");
			return false;
		}
	}
	if(c!="")
	{
		var usr;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  usr=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  usr=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		usr.onreadystatechange=function ()
		  {
		  if (usr.readyState==4 && usr.status==200)
			{
				console.log(usr.responseText);
				if(v==1)fetch_course();
				if(v==2)fetch_trade();
				if(v==3)fetch_syllabus();
				if(v==4)fetch_subject();
			}
		  }
		  
		usr.open("POST","backend/addcourse.php",true);
		usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		usr.send(reqparams);
	}
}