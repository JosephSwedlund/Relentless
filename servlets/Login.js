const AppDao = require('../classes/AppDao.js');

const Login = {
	get: function(req, resp) {
		resp.render('login.ejs', { msg: false });
	},

	post: function(req, resp) {
		var name = req.body.name;
		var pass = req.body.pass;

		var dao = new AppDao();
		dao.retrieveUser(name, pass, (user) => {
			if (user && user.length) {
				req.session.user = user[0];
				resp.redirect('/node/dashboard/');
			}
			else {
				resp.render('login.ejs', { msg: "Invalid Credentials" });
			}
			dao.close();
		});
	}
}

module.exports = Login;