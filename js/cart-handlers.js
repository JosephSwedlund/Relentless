//$("#items").load("display_cart.php", { is_wishlist: 0 });
$(".cart-item-removal").submit(function (event) {
	event.preventDefault();
	$.post("remove_from_cart.php", $(this).serialize())
	.done(function (data) {
		if (data == "success")
			$("#items").load("display_cart.php", { is_wishlist: 0 });
	});
});