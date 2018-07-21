	
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
	var course=document.forms.qnpcreator.coursee.value;

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
	var course= document.forms.qnpcreator.coursee.value;
	var trade=document.forms.qnpcreator.tradee.value;

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
	var course= document.forms.qnpcreator.coursee.value;
	var trade=document.forms.qnpcreator.tradee.value;
	var syllabus=document.forms.qnpcreator.syllabuss.value;

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
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course+"& syllabus="+syllabus);

}		

function validate_qnpcreator()
{
	var x1 = document.forms.qnpcreator.qpname.value;
	if (x1 == null || x1== "")
	  {
	  alert("Please enter a name for the question paper!");
	  return false;
	  }	
	  
	  
	var x2 = document.forms.qnpcreator.noq.value;
	if (x2 == null || x2== "" || isNaN(x2))
	  {
	  alert("Please enter a valid number for the number of questions in question paper");
	  return false;
	  }	
	  
		
	var x3 = document.forms.qnpcreator.dur.value;
	if (x3 == null || x3 == "" || isNaN(x3))
	  {
	  alert("Please enter a valid duration for the test in minutes");
	  return false;
	  }	 
	  
	  
	var x4 = document.forms.qnpcreator.coursee.value;
	if (x4 == null || x4 == "")
	  {
	  alert("Please select a course");
	  return false;
	  }	 
	var x5 = document.forms.qnpcreator.tradee.value;
	if (x5 == null || x5 == "")
	  {
	  alert("Please select a trade");
	  return false;
	  }	 
	var x6 = document.forms.qnpcreator.syllabuss.value;
	if (x6 == null || x6 == "")
	  {
	  alert("Please select a sylabus");
	  return false;
	  }	 
	var x7 = document.forms.qnpcreator.subjectt.value;
	if (x7 == null || x7 == "")
	  {
	  alert("Please select a subject");
	  return false;
	  }	 
}
	
	
