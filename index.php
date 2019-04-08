<?php
	/**************************
*
* Database Connections
*
***************************/
$link = new mysqli("localhost:3306","root","","relentless");


if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}
/**************************
*
* Database interactions
*
***************************/

?>
<html>
    <head>
		<title>Relentless - Sign In</title>

        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        
        <script>
           <?php
            if(isset($_REQUEST["action"]))
                $action = $_REQUEST["action"];
            else
                $action = "none";

            $message = "";
            setcookie("bloguser", "name", time()-100);

            if ($action == "login") {
                $name = $_POST["name"];
                $password = $_POST["password"];
                $name = htmlentities($link->real_escape_string($name));
                $password = htmlentities($link->real_escape_string($password));
                $result = $link->query("SELECT * FROM accounts WHERE name='" . $name . "'");
                if(!$result)
                    die ('Can\'t query users because: ' . $link->error);
                else{
                    $row = $result->fetch_assoc();
                    if($password == $row["password"] && $password != "" && $name != ""){
                        setcookie("bloguser",$name, 0, '/');
                        header("Location: html/main.php");
                    }
                    else
                        $message = "<div class='alert alert-danger w-25 align text-center' style='position: fixed; top: 25px; left: 50%; transform: translate(-50%, 0);'>Whoops! Looks like that's an incorrect username or password.</div>";
                }
            }
            ?>
        </script>
    </head>
    <body class="login-page">
		
		<div><?php print $message?></div>

		<div class="card w-25 login-box">
			<div class="card-header">
				Sign in to your account
			</div>
			<div class="card-body">
				<form name="myForm" method="post" action="index.php">
					<div class="form-group">
						<label for="exampleInputUsername1">Username</label>
						<input type="username" class="form-control" name="name" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Enter your username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter your password">
					</div>
					<a href="html/new_account.php" class="btn btn-outline-info">Don't have an account?</a>
					<input type="hidden" name="action" value="login" />
					<button type="submit" id="go" class="btn btn-success submit-button">Sign in</button>	
				</form>
			</div>
		</div>
		
		<script>
			$("#go").click(validateLogin);
		</script>
		
    </body>
</html>