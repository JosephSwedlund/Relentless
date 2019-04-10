<?php
	session_start();

	$link = new mysqli("localhost", "root", "", "relentless");

	$username = $_SESSION["user"]["name"];

	$isbn = $_POST["isbn"];
	$is_wishlist = $_POST["is_wishlist"];

	$result = $link->query("insert into cart (username, ISBN, is_wishlist) value ('$username', $isbn, $is_wishlist);");

	if ($result)
		print("success");
	else
		print("fail");
?>
