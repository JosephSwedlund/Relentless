class AppDao {
	//establishes a connection with the mysql server
	constructor() {
		this.con = require('mysql').createConnection({ host: "localhost", user: "root", password: "hitoyo142", database: "node" });
		this.ordering = { new: 'date desc', old: 'date asc', name: 'title asc', name2: 'title desc', genre: 'category asc', auth: 'author asc', auth2: 'author desc', isbn: 'isbn' }
		this.con.connect((err) => { return; });
	}

	close() {
		this.con.end();
	}

	//check for an entry in the database with given credentials
	retrieveUser(name, pass, callback) {
		this.con.query("select id, username, email from users where username = '"+name+"' and password = '"+pass+"';", (err, result, fields) => {
			if (err) throw err;
			return callback(result);
		});
	}

	registerUser(name, email, pass, callback) {
		this.con.query("insert into users (username, email, password) value ('"+name+"', '"+email+"', '"+pass+"')", (err, result) => {
			if (err) throw err;
			return callback(result);
		});
	}

	searchLibrary(sort, callback) {
		this.con.query("select * from library order by "+this.ordering[sort], (err, result, fields) => {
			if (err) throw err;
			return callback(result);
		});
	}

	addToCart(name, isbn, wish, callback) {
		this.con.query("insert into cart (username, ISBN, is_wishlist) value ('"+name+"', '"+isbn+"', '"+wish+"')", (err, result) => {
			if (err) throw err;
			return callback(result);
		});
	}

	removeFromCart(id, callback) {
		this.con.query("delete from cart where id = "+id, (err, result) => {
			if (err) throw err;
			return callback(result);
		});
	}

	getCart(name, wish, callback) {
		var sql =  'SELECT c.id, l.isbn, l.title, l.author, sum(l.price) AS price, count(c.id) AS copies ';
			sql += 'FROM cart AS c JOIN library AS l ';
			sql += '  ON c.ISBN = l.isbn ';
			sql += "WHERE c.username = '"+name+"' and is_wishlist = "+wish+" ";
			sql += 'GROUP BY ISBN';

		this.con.query(sql, (err, result, fields) => {
			if (err) throw err;
			return callback(result);
		});
	}

	getListing(isbn, callback) {
		this.con.query("select * from library where ISBN = "+isbn, (err, result, fields) => {
			if (err) throw err;
			return callback(result);
		});
	}

	getReviews(isbn, callback) {
		this.con.query("select * from review where ISBN = "+isbn, (err, result, fields) => {
			if (err) throw err;
			return callback(result);
		});
	}

	addReview(rank, review, isbn, user, callback) {
		var sql = "insert into review (username, user_id, review, rating, ISBN) VALUES ( '"+user.username+"', '"+user.id+"', '"+review+"', '"+rank+"', '"+isbn+"')";
		this.con.query(sql, (err, result, fields) => {
			if (err) throw err;
			return callback(result);
		});
	}
}

module.exports = AppDao;