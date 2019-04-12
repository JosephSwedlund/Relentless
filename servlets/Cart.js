const AppDao = require("../classes/AppDao");

const Cart = {
	get: function(req, resp) {
		resp.render('cart.ejs');
	},

	post: function(req, resp) {
		var name = req.session.user.username, wish = req.body.is_wishlist;
		var dao = new AppDao();
		dao.getCart(name, wish, (items) => {
			resp.render('cartItems.ejs', { items: items });
			dao.close();
		});
	}
}

module.exports = Cart;