CREATE TABLE IF NOT EXISTS products (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS shopping_cart (
user_id INT(11) NOT NULL,
product_id INT(11) NOT NULL,
quantity INT(11) NOT NULL,
FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, price) VALUES ('Product 1', 10.99);
INSERT INTO products (name, price) VALUES ('Product 2', 19.99);
INSERT INTO products (name, price) VALUES ('Product 3', 5.99);
INSERT INTO products (name, price) VALUES ('Product 4', 15.99);
INSERT INTO products (name, price) VALUES ('Product 5', 12.49);
INSERT INTO products (name, price) VALUES ('Product 6', 8.99);
INSERT INTO products (name, price) VALUES ('Product 7', 29.99);
INSERT INTO products (name, price) VALUES ('Product 8', 7.99);
INSERT INTO products (name, price) VALUES ('Product 9', 10.00);
INSERT INTO products (name, price) VALUES ('Product 10', 22.99);
