function setcookie(){
	var email = getElementById('email').value;
	var password1 = getElementById('password').value;
	
	document.cookie="myEmail="+email+";path=http://localhost/web6pm/";
	document.cookie="myPassword="+password1+";path=http://localhost/web6pm/";
}

function getcookies(){
	console.Log(document.cookie);
	var user_email = getData('myEmail');
	var user_password = getData('myPassword');
	getElementById('email').value = user_email;
	getElementById('password').value = user_password;
	alert(user_email);
}

function getData(cname){
	var email = cname + "=";
	var decodedCookie =  decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i<ca.length; i++){
		var c = ca[i];
		while(c.charAt(0) == ' '){
			c = c.substring(1);
		}
		if(c.indexOf(email) == 0){
			return c.substring(email.length, c.length);
		}
	}
	return cname;
}