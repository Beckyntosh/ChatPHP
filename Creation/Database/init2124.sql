CREATE TABLE IF NOT EXISTS shopping_cart (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
product_name VARCHAR(50) NOT NULL,
quantity INT UNSIGNED NOT NULL,
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (1, 'Gardening Tool 1', 2, 25.99);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (1, 'Gardening Tool 2', 1, 15.49);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (2, 'Gardening Tool 3', 3, 12.99);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (2, 'Gardening Tool 4', 1, 8.99);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (3, 'Gardening Tool 5', 2, 20.99);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (3, 'Gardening Tool 6', 1, 10.49);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (4, 'Gardening Tool 7', 3, 30.99);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (4, 'Gardening Tool 8', 1, 18.49);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (5, 'Gardening Tool 9', 2, 15.99);
INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (5, 'Gardening Tool 10', 1, 9.99);
