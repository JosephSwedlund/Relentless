$(document).ready(function(){
	$("#password2").keyup(function(){
		if ($("#password").val() != $("#password2").val()) {
			 $("#msg").html("Passwords do not match").css("color","red");
		}
		else{
			 $("#msg").html("Passwords match").css("color","green");
		}
	});
});

$("#myForm").submit(function (event) {
	event.preventDefault();
	$.post("../ajax/register_user.php", $(this).serialize())
	.done((data) => {
		if (data == "success") {
			$("#myForm").off("submit");
			$("#myForm").submit();
		}
		else {
			$("#msg").html("Username already taken");
		}
	});
});