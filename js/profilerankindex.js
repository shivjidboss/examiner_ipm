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
	var course=document.forms.signup.course.value;

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
	var course= document.forms.signup.course.value;
	var trade=document.forms.signup.trade.value;

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
		}
	  }

	usr.open("POST","backend/managecourseajax.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send( "trade="+trade+"& course="+course);

}	