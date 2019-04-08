<?php
	session_start();

	$link = new mysqli("localhost", "root", "", "relentless");

	$username = $_SESSION["username"];
	$is_wishlist = $_POST["is_wishlist"];

	$result = $link->query("select * from cart where username = '$username' and is_wishlist = $is_wishlist;");
?>

<?php while ($row = $result->fetch_assoc()): ?>

<?php endwhile; ?>