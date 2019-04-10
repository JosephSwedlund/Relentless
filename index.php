<!DOCTYPE html>
<html>
    <head>
		<title>Relentless - Sign In</title>

        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

        <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="login-page">
		
		<div id="message"></div>

		<div class="card w-25 login-box">
			<div class="card-header">
				Sign in to your account
			</div>
			<div class="card-body">
				<form id="login-form" method="post" action="html/main.php">
					<div class="form-group">
						<label for="name-input">Username</label>
						<input type="username" class="form-control" name="name" id="name-input" aria-describedby="usernameHelp" placeholder="Enter your username" />
					</div>
					<div class="form-group">
						<label for="password-input">Password</label>
						<input type="password" class="form-control" name="password" id="password-input" placeholder="Enter your password" />
					</div>
				</form>
				<a href="html/new_account.php" class="btn btn-outline-info">Don't have an account?</a>
				<button id="go" class="btn btn-success submit-button">Sign in</button>
			</div>
		</div>
		
		<script>
			$("#login-form").submit(function (event) {
                event.preventDefault();
                $.post("ajax/validate_user.php", $(this).serialize())
                .done((data)=>{
                    alert(data);
                    if (data != "success")
                        $("#message").append("<div class='alert alert-danger w-25 align text-center' style='position: fixed; top: 25px; left: 50%; transform: translate(-50%, 0);'>Whoops! Looks like that's an incorrect username or password.</div>");
                    else {
                        $("#login-form").off("submit");
                        $("#login-form").submit();
                    }
                });
            });

            $("#go").click(()=>{
                $("#login-form").submit();
            });
		</script>
		
    </body>
</html>