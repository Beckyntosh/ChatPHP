CREATE TABLE IF NOT EXISTS shopping_cart (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id VARCHAR(30) NOT NULL,
product_id INT(6) NOT NULL,
quantity INT(3) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user1', 1, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user1', 2, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user2', 3, 3);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user2', 4, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user3', 5, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user3', 6, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user4', 7, 3);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user4', 8, 1);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user5', 9, 2);
INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES ('user5', 10, 3);
