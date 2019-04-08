function validate() {
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var password1 = document.getElementById("password").value;
	var password2 = document.getElementById("password2").value;
	var errmessage = "";
	if(name.trim() == ""){
		errmessage = errmessage.concat("Please enter a name.\n");
	}
	if(email.indexOf("@") == -1){
		errmessage = errmessage.concat("Please enter a valid email.\n");
	}
	if(password1.trim() == ""){
		errmessage = errmessage.concat("Please enter a password.\n");
	}
	if(password1 != password2){
		errmessage = errmessage.concat("Passwords must match.");
	}
	if(errmessage == ""){
		//alert("Name: "+name+"\nEmail: "+email+"\nComment: "+comment);
		//document.getElementById("posted_comments").innerHTML = ("<div id=\"comment_box\"><p><img src=\"img/m4.gif\" style=\"width: 25%\"> "+name+" said:</p><br><p>"+comment+"</p></div>");
		document.forms["myForm"].submit();
	}
	else{
		alert(errmessage);
	}
}