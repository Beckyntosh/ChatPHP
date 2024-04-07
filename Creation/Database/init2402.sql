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
  viewed_at TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  category VARCHAR(30) NOT NULL
);

INSERT INTO users (username, password) VALUES ('user1', 'pass1');
INSERT INTO users (username, password) VALUES ('user2', 'pass2');
INSERT INTO users (username, password) VALUES ('user3', 'pass3');
INSERT INTO users (username, password) VALUES ('user4', 'pass4');
INSERT INTO users (username, password) VALUES ('user5', 'pass5');

INSERT INTO browsing_history (user_id, product_id, viewed_at) VALUES (1, 1, NOW());
INSERT INTO browsing_history (user_id, product_id, viewed_at) VALUES (1, 2, NOW());
INSERT INTO browsing_history (user_id, product_id, viewed_at) VALUES (2, 1, NOW());
INSERT INTO browsing_history (user_id, product_id, viewed_at) VALUES (3, 2, NOW());

INSERT INTO products (name, category) VALUES ('Teddy Bear', 'Plush Toys');
INSERT INTO products (name, category) VALUES ('Lego Set', 'Building Blocks');
INSERT INTO products (name, category) VALUES ('RC Car', 'Remote Control Toys');
INSERT INTO products (name, category) VALUES ('Dollhouse', 'Dolls & Accessories');
INSERT INTO products (name, category) VALUES ('Board Game', 'Family Games');
