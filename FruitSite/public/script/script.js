var $j = jQuery.noConflict();

function submitLoginForm(baseurl, action, op, form)
{   
	
	document.getElementById('op').value=op;
	var formName=form.name;
	
	if(op=='login')
	{	
		document.body.style.cursor='progress';
		document.forms[formName].action=baseurl+action;
		document.forms[formName].submit();
	}
	
}

//Function for Grade Details form
function submitFruitsBazaarForm(baseurl, action, op, form)
{
	var formName = form.name;
	
	if(op=='save')
	{	
		document.getElementById('msgHdn').value=op;
		document.body.style.cursor='progress';
		document.forms[formName].action=baseurl+action;
		document.forms[formName].submit();
	
	}
	
		
}

function submitAdminBazaarForm(baseurl, action, op, form)
{
		var formName = form.name;
		if(op=='submit')
	{	
		document.getElementById('msgHdn').value=op;
		document.body.style.cursor='progress';
		document.forms[formName].action=baseurl+action;
		document.forms[formName].submit();
	
	}	
	
}

