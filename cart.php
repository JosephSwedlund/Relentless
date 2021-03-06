<?php
	session_start();

	$link = new mysqli("localhost", "root", "", "relentless");

	$sum = 15;

	$_SESSION["username"] = "daniel";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Relentless Cart</title>
	<!-- Jquery -->
	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<!-- My CSS -->
</head>
<body>
	<div id="wrapper" class="container-fluid">
		<div class="row">
			<div id="items" class="col-9">
				<div class="card cart-item">
					<div class="card-body">
						<p class="float-left px-3">ISBN: 12351324</p>
						<p class="float-left px-3">Title: Dork</p>
						<form class="form-inline float-right px-3 cart-item-removal">
							<input type="hidden" class="form-control" name="id" value="0" />
							<button type="submit" class="btn btn-primary">Remove</button>
						</form>
						<a href="view?isbn=<?php //id ?>" class="btn btn-primary float-right">View</a>
					</div>
				</div>
			</div>
			<dvi class="col">
				<div class="card">
					<div id="checkout" class="card-body">
						<from id="checkout-form">
							<div class="form-group row">
								<label for="subtotal" class="col-sm-7 col-form-label">Cart Subtotal</label>
								<div class="col-sm-5">
									<input type="text" id="subtotal" class="form-control-plaintext text-right" size="4" readonly value="<?php print($sum); ?>" />
								</div>
							</div>
							<div class="form-group row">
								<label for="Taxes" class="col-sm-7 col-form-label">Taxes</label>
								<div class="col-sm-5">
									<input type="text" id="Taxes" class="form-control-plaintext text-right" size="4" readonly value="<?php print($sum * .08); ?>" />
								</div>
							</div>
							<div class="form-group row">
								<label for="subtotal" class="col-sm-7 col-form-label">Cart Total</label>
								<div class="col-sm-5">
									<input type="text" id="subtotal" class="form-control-plaintext text-right" readonly value="<?php print($sum * 1.08); ?>" />
								</div>
							</div>
						</from>
					</div>
				</div>
			</dvi>
		</div>
	</div>

	<!-- My Scripts -->
	<script type="text/javascript" src="js/cart-handlers.js"></script>
</body>
</html>