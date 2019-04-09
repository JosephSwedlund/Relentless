<?php
	session_start();

	$link = new mysqli("localhost", "root", "", "relentless");
	$username = $_SESSION["username"];
	$is_wishlist = $_POST["is_wishlist"];

	$result = $link->query("SELECT c.id, l.isbn, l.title, l.author, sum(l.price) AS price, count(c.id) AS copies
							FROM cart AS c JOIN library AS l
							  ON c.ISBN = l.isbn
							WHERE c.username = '$username' and is_wishlist = $is_wishlist
							GROUP BY ISBN;");
?>

<?php while ($row = $result->fetch_assoc()): ?>
	<div class="card cart-item">
		<div class="card-body">
			<p class="float-left px-3">Title: <?php print($row['title']); ?></p>
			<p class="float-left px-3">Author: <?php print($row['author']); ?></p>
			<p class="float-left px-3">Copies: <?php print($row['copies']); ?></p>
			<p  class="float-left px-3">Price:</p> <input type="text" name="price" class="px-3 price form-control-plaintext w-25" value="<?php print($row['price']); ?>" readonly />
			<form class="form-inline float-right px-3 cart-item-removal">
				<input type="hidden" class="form-control" name="id" value="<?php print($row['id']); ?>" />
				<button type="submit" class="btn btn-primary">Remove</button>
			</form>
			<a href="view?isbn=<?php  print($row['isbn']); ?>" class="btn btn-primary float-right">View</a>
		</div>
	</div>
<?php endwhile; ?>
