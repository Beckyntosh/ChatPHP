CREATE TABLE IF NOT EXISTS shopping_cart (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11) NOT NULL,
product_id INT(11) NOT NULL,
quantity INT(11) NOT NULL,
saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 101, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 102, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 103, 3);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 104, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 105, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 106, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 107, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 108, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 109, 3);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (1, 110, 1);
