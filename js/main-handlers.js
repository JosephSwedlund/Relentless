$(".book").attr("draggable", true);

$(".book").on("dragstart", function (event) {
	$(this).attr("is-dragged", true);
});

$(".book").on("dragstart", function (event) {
	$(this).removeAttr("is-dragged");
});

$("#to-cart").on("dragover", function (event) {
	event.preventDefault();
});

$("#to-cart").on("drop", function (event) {
	event.preventDefault();
	$.post("../ajax/add_to_cart.php", { isbn: $("div[is-dragged]").attr("data-isbn"), is_wishlist: 0 })
	.done(function (data) {
		alert(data);
	});
});