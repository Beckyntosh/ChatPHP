CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
);

CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productname VARCHAR(30) NOT NULL,
price INT(6) NOT NULL
);

INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');
INSERT INTO users (username, password) VALUES ('user3', 'password3');
INSERT INTO users (username, password) VALUES ('user4', 'password4');
INSERT INTO users (username, password) VALUES ('user5', 'password5');
INSERT INTO users (username, password) VALUES ('user6', 'password6');
INSERT INTO users (username, password) VALUES ('user7', 'password7');
INSERT INTO users (username, password) VALUES ('user8', 'password8');
INSERT INTO users (username, password) VALUES ('user9', 'password9');
INSERT INTO users (username, password) VALUES ('user10', 'password10');

INSERT INTO products (productname, price) VALUES ('product1', 100);
INSERT INTO products (productname, price) VALUES ('product2', 200);
INSERT INTO products (productname, price) VALUES ('product3', 150);
INSERT INTO products (productname, price) VALUES ('product4', 180);
INSERT INTO products (productname, price) VALUES ('product5', 120);
INSERT INTO products (productname, price) VALUES ('product6', 250);
INSERT INTO products (productname, price) VALUES ('product7', 300);
INSERT INTO products (productname, price) VALUES ('product8', 170);
INSERT INTO products (productname, price) VALUES ('product9', 190);
INSERT INTO products (productname, price) VALUES ('product10', 220);