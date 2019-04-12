const AppDao = require("../classes/AppDao.js");

function LoggedIn(req, resp, next) {
	if (!req.baseUrl.startsWith('/node/login') && (!req.session || !req.session.user))
		return resp.redirect("/node/login");
	return next();
}

module.exports = LoggedIn;