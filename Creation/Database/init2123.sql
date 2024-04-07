CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  quantity INT(10) NOT NULL,
  user_id INT(10) NOT NULL,
  saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 1', 2, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 2', 1, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 3', 3, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 4', 1, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 5', 2, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 6', 1, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 7', 3, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 8', 1, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 9', 2, 1);
INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES ('Desktop 10', 1, 1);
