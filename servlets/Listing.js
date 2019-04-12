const AppDao = require('../classes/AppDao.js');

const Listing = {
	get: function(req, resp) {
		var isbn = req.query.id;
		var dao = new AppDao();
		dao.getListing(isbn, (book) => {
			dao.getReviews(isbn, (reviews) => {
				resp.render('listing.ejs', { user: req.session.user, isbn: isbn, book: book[0], reviews: reviews });
				dao.close();
			});
		});
	}
}

module.exports = Listing;