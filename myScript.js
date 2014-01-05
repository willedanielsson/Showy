
function showLogin(){

	var element = document.getElementById("login_wrapper");
	if(element.style.visibility != 'hidden' ){ 	//Om den visas
		element.style.visibility = 'hidden';	//Dölj den
	}
	else{
		element.style.visibility='visible'; //Annars så är den döljd
											//DÅ ska vi visa de
		 document.getElementById("sign_up_wrapper").style.visibility='hidden'; //Stäng den andra då
	}
}

function showSign(){
	var element2 = document.getElementById("sign_up_wrapper");
	if(element2.style.visibility != 'hidden'){
		element2.style.visibility ='hidden';
	}
	else{
		element2.style.visibility = 'visible';
		document.getElementById("login_wrapper").style.visibility='hidden';
	}
}

function failed_login(){

	document.getElementById("login_wrapper").style.visibility="visible";
	document.getElementById("sign_up_wrapper").style.visibility="hidden";
	document.getElementById("login_text").style.color="red";
}
