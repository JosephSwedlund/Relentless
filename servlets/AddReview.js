const AppDao = require('../classes/AppDao.js');

const AddReview = {
	post: function(req, resp) {
		var rank = req.body.rank, review = req.body.reviewText, isbn = req.body.isbn, user = req.session.user;
		var dao = new AppDao();
		dao.addReview(rank, review, isbn, user, (result) => {
			resp.send((result) ? 'success' : 'fail');
			dao.close();
		});
	}
}

module.exports = AddReview;