	
function searchrecord()
{
	
	var query;
	var userid= document.forms.searchusr.userid.value;
	var name= document.forms.searchusr.name.value;
	var phone= document.forms.searchusr.phone.value;
	var email= document.forms.searchusr.email.value;
	if(userid == "" && name == "" && phone == "" && email == "")
	{
		alert("Please enter any search criteria");
		return false;
	}
	var radios = document.getElementsByName('isset');
	for (var i = 0, length = radios.length; i < length; i++) 
	{
		if (radios[i].checked) 
		{
			query = "isset="+radios[i].value+"& userid="+userid+"& name="+name+"& phone="+phone+"& email="+email;
		}
	}
	
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
			document.getElementById("sresulttbl").innerHTML=usr.responseText;
		}
	  }
	usr.open("POST","backend/searchuserbackend.php",true);
	usr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	usr.send(query);
}
	
function srchusradioctrl(o)
{
	if(o==1)document.getElementById('srchid').checked=true;
	if(o==2)document.getElementById('srchname').checked=true;
	if(o==3)document.getElementById('srchphn').checked=true;
	if(o==4)document.getElementById('srchmail').checked=true;
}	
	
	
	