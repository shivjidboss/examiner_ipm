// JavaScript Document


function validateForm()
{
	
var x1 = document.forms.signup.fname.value;
if (x1 == null || x1== "")
  {
  alert("It seems you haven't entered your First name!");
  return false;
  }	
  
  
var x2 = document.forms.signup.lname.value;
if (x2 == null || x2== "")
  {
  alert("It seems you haven't entered your Last name!");
  return false;
  }	
  
  
var x5=document.forms.signup.dob.value;
if (x5==null || x5=="")
  {
  alert("It seems you forgot to enter  date of birth!");
  return false;
  }	   
  
var x7 = document.forms.signup.email.value;
if (x7 == null || x7 == "")
  {
  alert("You haven't entered your email address!");
  return false;
  }	
var atpos = x7.indexOf("@");
var dotpos = x7.lastIndexOf(".");
if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x7.length)
  {
  alert("Not a valid e-mail address!");
  return false;
  }
  

var x6 = document.forms.signup.password.value;
if (x6 == null || x6 == "")
  {
  alert("You haven't created a password for your new account!");
  return false;
  }

var x9 = document.forms.signup.trade.value;	
  if(x9== null || x9 == "")
  {
  alert("You have't entered the address!");
  return false;
  }
  //alert("Form validated");
}



	
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
