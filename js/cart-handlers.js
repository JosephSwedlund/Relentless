function fix(val) {
	return Number.parseFloat(val).toFixed(2);
}

function costCalc() {
	var subtotal = $('#subtotal');
	subtotal.val(0);
	$(".price").each(function (i) {
		subtotal.val(parseFloat(subtotal.val()) + parseFloat($(this).val()));
	});
	subtotal.val(fix(subtotal.val()));
	$('#taxes').val(fix(parseFloat(subtotal.val()) * .08));
	$('#total').val(fix(parseFloat(subtotal.val()) * 1.08));
}

function load() {
	$('#items').html("");
	$('#wish').html("");

	$("#items").load("/node/cart", { is_wishlist: 0 }, function () {
		$(".cart-item-removal").submit(removeFromCart);
		costCalc();
	});

	$("#wish").load("/node/cart", { is_wishlist: 1 }, function () {
		$(".cart-item-removal").submit(removeFromCart);
	});
}

function removeFromCart(event) {
	event.preventDefault();
	$.post("/node/remove-from-cart", $(this).serialize())
	.done(function (data) {
		if (data == "success")
			load();	
	});
}

load();