const AppDao = require('../classes/AppDao.js');

const SignUp = {
	get: function(req, resp) {
		resp.render('signUp.ejs');
	},

	post: function(req, resp) {
		var name = req.body.name, email = req.body.email, pass = req.body.password;
		var dao = new AppDao();
		dao.registerUser(name, email, pass, (result) => {
			if (result.affectedRows) {
				dao.retrieveUser(name, pass, (user) => {
					req.session.user = user[0];
					resp.send('success');
				});
			}
			else
				resp.send('failure');
			dao.close();
		});
	}
}

module.exports = SignUp;