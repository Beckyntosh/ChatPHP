CREATE TABLE IF NOT EXISTS users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT(6) UNSIGNED,
	product_id INT(6) UNSIGNED,
	view_date TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	category VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password) VALUES ('JohnDoe', 'password1'), ('JaneSmith', 'password2');

INSERT INTO products (name, category) VALUES ('Laptop A1', 'Electronics'), ('Laptop B2', 'Electronics'), ('Laptop C3', 'Electronics'), ('Laptop D4', 'Electronics'), ('Laptop E5', 'Electronics'), ('Laptop F6', 'Electronics'), ('Laptop G7', 'Electronics'), ('Laptop H8', 'Electronics'), ('Laptop I9', 'Electronics'), ('Laptop J10', 'Electronics');