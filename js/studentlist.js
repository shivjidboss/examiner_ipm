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
	var course=document.forms.studentlist.course.value;

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
	var course= document.forms.studentlist.course.value;
	var trade=document.forms.studentlist.trade.value;

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

function getstudentlist()
{
	
	var query,byrank,pwd,crs,trd,syl,sex,dob,email,phone,addr,institute,imgid;
	var course = document.forms.studentlist.course.value;
	var trade = document.forms.studentlist.trade.value;
	var syllabus = document.forms.studentlist.syllabus.value;
	if(document.forms.studentlist.byrank.checked == true)byrank=1;else byrank=0;
	if(document.forms.studentlist.pwd.checked == true)pwd=1;else pwd=0;
	if(document.forms.studentlist.crs.checked == true)crs=1;else crs=0;
	if(document.forms.studentlist.trd.checked == true)trd=1;else trd=0;
	if(document.forms.studentlist.syl.checked == true)syl=1;else syl=0;
	if(document.forms.studentlist.sex.checked == true)sex=1;else sex=0;
	if(document.forms.studentlist.dob.checked == true)dob=1;else dob=0;
	if(document.forms.studentlist.email.checked == true)email=1;else email=0;
	if(document.forms.studentlist.phone.checked == true)phone=1;else phone=0;
	if(document.forms.studentlist.addr.checked == true)addr=1;else addr=0;
	if(document.forms.studentlist.institute.checked == true)institute=1;else institute=0;
	if(document.forms.studentlist.imgid.checked == true)imgid=1;else imgid=0;
	
	if(course=="")
	{
		alert("Please select a course");
		return false;
	}
	
	query = "course="+course+"& trade="+trade+"& syllabus="+syllabus+"& byrank="+byrank;
	query = query+"& pwd="+pwd+"& crs="+crs+"& trd="+trd+"& syl="+syl+"& sex="+sex+"& dob="+dob;
	query = query+"& email="+email+"& phone="+phone+"& addr="+addr+"& institute="+institute+"& imgid="+imgid;

	
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
			document.getElementById("studentlistbox").innerHTML=usr.responseText;
		}
	  }
	usr.open("POST","backend/studentlistbackend.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send(query);
}


function vwprof(uid)
{
	document.forms.viewprof.uid.value=uid.innerHTML;
	document.forms.viewprof.submit();
}