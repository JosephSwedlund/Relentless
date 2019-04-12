$(".book").attr("draggable", true);

$(".book").on("dragstart", function (event) {
	$(this).attr("is-dragged", true);
});

$(".book").on("dragend", function (event) {
	$(this).removeAttr("is-dragged");
});

$("#to-cart").on("dragover", function (event) {
	event.preventDefault();
});

$("#to-wish").on("dragover", function (event) {
	event.preventDefault();
});

$("#to-cart").on("drop", function (event) {
	event.preventDefault();
	var isbn = $("[is-dragged]").attr("data-isbn");
	$.post("/node/add-to-cart", { isbn: isbn, is_wishlist: 0 });
});

$("#to-wish").on("drop", function (event) {
	event.preventDefault();
	var isbn = $("[is-dragged]").attr("data-isbn");
	$.post("/node/add-to-cart", { isbn: isbn, is_wishlist: 1 });
});