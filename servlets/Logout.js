const Logout = {
	all: function(req, resp) {
		req.session.destroy((err) => {
			if (err) throw err;
			resp.redirect('/node/login');
		});
	}
}

module.exports = Logout;