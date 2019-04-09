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
	$("#items").load("../ajax/display_cart.php", { is_wishlist: 0 }, function () {
		$(".cart-item-removal").submit(removeFromCart);
		costCalc();
	});
}

function removeFromCart(event) {
	event.preventDefault();
	$.post("../ajax/remove_from_cart.php", $(this).serialize())
	.done(function (data) {
		if (data == "success")
			load();	
	});
}

load();