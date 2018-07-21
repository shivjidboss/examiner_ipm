
document.onkeydown = function (e) 
{
    e = e || window.event;//Get event
    if (e.ctrlKey) 
	{
		if(e.shiftKey)
		{
			//alert('No no no no....');
			e.preventDefault();     
			e.stopPropagation();
		}
		else 
		{
			var c = e.which || e.keyCode;//Get key code
			switch (c) 
			{
				case 69:
					var body = document.getElementsByTagName('body')[0];
					body.style.background = 'url(/ipm/resources/einsteinblackboard.jpg) no-repeat center center fixed';
					e.preventDefault();     
					e.stopPropagation();
					break;
			}
		}
	}
	else if(e.shiftKey)
	{
		var c = e.which || e.keyCode;//Get key code
		switch (c) 
		{
			case 112:
			case 113:
			case 114:
			case 115:
			case 116:
			case 117:
			case 118:
			case 119:
			case 120:
			case 121:
			case 122:
			case 123:
				//alert('No no no no....');
				e.preventDefault();     
				e.stopPropagation();
			break;
		}	
	}
	else if(e.altKey)
	{
		var c = e.which || e.keyCode;//Get key code
		switch (c) 
		{
			case 37:
			case 39:
				//alert('No no no no....');
				e.preventDefault();     
				e.stopPropagation();
			break;
		}			
	}
	else
	{
		var c = e.which || e.keyCode;//Get key code
		switch (c) 
		{
			case 116:
			case 123:
				//alert('No no no no....');
				e.preventDefault();     
				e.stopPropagation();
			break;
		}
	}
}

window.oncontextmenu = function () 
{
	//alert('No no no no....');
	return false;
}

function contactadmin()
{
	window.location.reload();
	alert("Please conact your administrator!");
}

function remvelem(elemID) 
{
    var elem = document.getElementById(elemID);
    if (elem.parentNode) 
	{
        elem.parentNode.removeChild(elem);
    }
}




