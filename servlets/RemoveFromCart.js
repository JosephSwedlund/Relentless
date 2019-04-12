const AppDao = require('../classes/AppDao');

const RemoveFromCart = {
	post: function(req, resp) {
		var id = req.body.id;
		var dao = new AppDao();
		dao.removeFromCart(id, (result) => {
			resp.send((result.affectedRows) ? 'success' : 'failure');
			dao.close();
		});
	}
}

module.exports = RemoveFromCart;