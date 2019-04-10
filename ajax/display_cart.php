<?php
	session_start();

	$link = new mysqli("localhost", "root", "", "relentless");
	$username = $_SESSION["user"]["name"];
	$is_wishlist = $_POST["is_wishlist"];

	$result = $link->query("SELECT c.id, l.isbn, l.title, l.author, sum(l.price) AS price, count(c.id) AS copies
							FROM cart AS c JOIN library AS l
							  ON c.ISBN = l.isbn
							WHERE c.username = '$username' and is_wishlist = $is_wishlist
							GROUP BY ISBN;");
?>

<?php while ($row = $result->fetch_assoc()): ?>
	<div class="card cart-item my-3">
		<div class="card-body">
			<div class="row">
				<div class="col-5">
					<a href="listing.php?isbn=<?php  print($row['isbn']); ?>" class="px-3 font-weight-bold text-dark"><?php print($row['title']); ?></a>
					<p class="px-3 font-italic font-weight-light"><?php print($row['author']); ?></p>
				</div>
				<div class="col">
					<form class="form-inline px-3 cart-item-removal float-right">
						<input type="hidden" class="form-control" name="id" value="<?php print($row['id']); ?>" />
						<p class="px-3 d-inline-flex">
							<input type="text" name="$" class="form-control-plaintext float-left text-right" size="1" value="$" readonly />
							<input type="text" name="cost" class="price form-control-plaintext float-left" size="5" value="<?php print($row['price']); ?>" readonly />
							<span class="text-right d-inline-block align-bottom" style="padding-top: 7px;">&times<?php print($row['copies']); ?></span>
						</p>
						<button type="submit" class="btn btn-primary float-right">Remove</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
