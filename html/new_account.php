<?php

	$link = new mysqli("localhost","root","","relentless");


	if ($link->connect_errno) {
		printf("Connect failed: %s\n", $link->connect_error);
		exit();
	}

	if(isset($_REQUEST["action"]))
		$action = $_REQUEST["action"];
	else
		$action = "none";

	$message = "";

	if($action == "add_user")
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$name = htmlentities($link->real_escape_string($name));
		$email = htmlentities($link->real_escape_string($email));
		$password = htmlentities($link->real_escape_string($password));
		$admin = 0;
        $money = 0;
		$result = $link->query("SELECT * FROM accounts WHERE name='" . $name . "'");
		if(mysqli_num_rows($result) == 0){
			$result = $link->query("INSERT INTO accounts (name, email, password) VALUES ('$name','$email','$password')"); //if broken, add '$id' to the values section
			setcookie("bloguser",$name, 0, '/');
			header("Location: main.php?sort=new");
		}
		else{
			$message = "Username already taken";
		}
		if(!$result)
			die ('Can\'t query users because: ' . $link->error);
	}
?>

<html>
    <head>
		<title>Relentless - New Account</title>
		
		<link rel="icon" href="../images/favicon.ico" type="image/ico">
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script src="../js/script.js"></script>
	</head>
    <body class="create-page">
		
			<div class="card w-25 login-box">
				<div class="card-header">
					Create an account
				</div>
				<div class="card-body">
					<form name="myForm" method="post" action="new_account.php">
						<div class="form-group">
							<label for="exampleInputUsername1">Username</label>
							<input type="username" class="form-control" name="name" id="name" aria-describedby="usernameHelp" placeholder="Enter your username">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control new_password" name="password" id="password" placeholder="Enter your password">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm your password">
						</div>						
						<a href="../index.php" class="btn btn-outline-info">Sign into an exising account</a>
						<button type="button" id="go" class="btn btn-success submit-button">Create account</button>	
						<input type="hidden" id = "date" name="date" value="<?php $datetime = new DateTime(); echo $datetime->format('Y-m-d H:i:s')?>" />
						<input type="hidden" name="id" value="<?php print time() ?>" />
						<input type="hidden" name="action" value="add_user" />
					</form>
					<div id="msg"><?php print $message?></div>
					
					<script>
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
						$("#go").click(validate);
					</script>
				</div>
			</div>

       	
    </body>
</html>
