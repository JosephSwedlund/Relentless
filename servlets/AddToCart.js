const AppDao = require("../classes/AppDao.js");

const AddToCart = {
	post: function(req, resp) {
		var name = req.session.user.username, isbn = req.body.isbn, wish = req.body.is_wishlist;
		var dao = new AppDao();
		dao.addToCart(name, isbn, wish, (result) => {
			resp.send((result.affectedRows) ? 'success' : 'failure');
			dao.close();
		});
	}
}

module.exports = AddToCart;