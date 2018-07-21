function updateqpdet(qpid)
{
var usr;
var qpname=document.forms.qpdetails.qpname.value;
var noq=document.forms.qpdetails.noq.value;
var dur=document.forms.qpdetails.dur.value;

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
    document.getElementById("updstatus").innerHTML=usr.responseText;
	}
  }
  
usr.open("POST","backend/qpdetupdate.php",true);
usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
usr.send("qpid="+qpid+"&qpname="+qpname+"&noq="+noq+"&dur="+dur);
}	