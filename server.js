//others peoples things
	const express = require('express');
	const session = require('express-session');
	const bodyParser = require('body-parser');
	const path = require('path');

//my files
	const filter = require('./filters/');
	const servlet = require('./servlets/');

const app = express();
app.set('views', path.join(__dirname, 'html'));
app.set('view engine', 'ejs');

//others middlewares
	app.use(express.static(path.join(__dirname, 'css')));
	app.use(express.static(path.join(__dirname, 'img')));
	app.use(express.static(path.join(__dirname, 'js')));
	app.use(session({ secret: '93ie7ryu47ei3', resave: false, saveUninitialized: false }));
	app.use(bodyParser.json());
	app.use(bodyParser.urlencoded({ extended: true }));

//my filters
	app.use('/node*', filter.loggedIn);

//my servlets
	app.get('/node/', (req, resp) => resp.redirect('/node/dashboard/'));

	app.get('/node/dashboard/', servlet.dashboard.get);
	app.post('/node/dashboard/', servlet.dashboard.post);

	app.get('/node/cart', servlet.cart.get);
	app.post('/node/cart', servlet.cart.post);

	app.get('/node/login', servlet.login.get);
	app.post('/node/login', servlet.login.post);

	app.get('/node/login/sign-up', servlet.signUp.get);
	app.post('/node/login/sign-up', servlet.signUp.post);

	app.get('/node/listing', servlet.listing.get);

	app.all('/node/logout', servlet.logout.all);

	app.post('/node/add-to-cart', servlet.addToCart.post);
	app.post('/node/remove-from-cart', servlet.removeFromCart.post);
	app.post('/node/add-review', servlet.addReview.post);

// start the server
app.listen(8080, () => console.log('Server started! At http://localhost:8080'));