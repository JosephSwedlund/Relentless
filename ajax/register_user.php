<?php
	$link = new mysqli("localhost", "root", "", "relentless");

	$name = htmlentities($link->real_escape_string($_POST["name"]));
	$email = htmlentities($link->real_escape_string($_POST["email"]));
	$password = htmlentities($link->real_escape_string($_POST["password"]));

	$result = $link->query("INSERT INTO accounts (name, email, password) VALUES ('$name','$email','$password')");
	if($result){
		$result = $link->query("SELECT id FROM accounts WHERE name = '$name'");
		$row = $result->fetch_assoc();
		session_start();
		$_SESSION["user"] = array("name"=>$name, "id"=>$row["id"]);
		print("success");
	}
	else {
		print("fail");
	}
?>