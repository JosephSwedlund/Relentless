const AppDao = require('../classes/AppDao.js');

const Dashboard = {
	get: function(req, resp) {
		var sort = (req.query.sort) ? req.query.sort : 'new';

		var dao = new AppDao();
		dao.searchLibrary(sort, (result) => {
			resp.render('main.ejs', { name: req.session.user.username , sort: sort, books: result });
			dao.close();
		});
	},

	post: function(res, resp) {
		resp.send("Welcome to Dashboard Post");
	}
}

module.exports = Dashboard;