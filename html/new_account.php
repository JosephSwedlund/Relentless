<!DOC
<html>
   <head>
		<title>Relentless - New Account</title>
		
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="icon" href="../images/favicon.ico" type="image/ico">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		
		<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script src="../js/script.js"></script>
	</head>
    <body class="create-page">
		
			<div class="card login-box">
				<div class="card-header">
					Create an account
				</div>
				<div class="card-body">
					<form id="myForm" method="post" action="main.php">
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
						<button type="submit" id="go" class="btn btn-success submit-button">Create account</button>	
						<input type="hidden" id = "date" name="date" value="<?php $datetime = new DateTime(); echo $datetime->format('Y-m-d H:i:s')?>" />
						<input type="hidden" name="id" value="<?php print time() ?>" />
						<input type="hidden" name="action" value="add_user" />
					</form>
					<div id="msg"></div>
					
					<script type="text/javascript" src="../js/new_account_handlers.js"></script>
				</div>
			</div>

       	
    </body>
</html>
