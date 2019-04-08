<?php
	$link = new mysqli("localhost", "root", "", "relentless");

	$id = $_POST["id"];

	$result = $link->query("delete from cart where id = $id;");

	if ($result)
		print("success");
	else
		print("fail");
?>