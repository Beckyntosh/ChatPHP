CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  user_id INT(11) NOT NULL,
  product_details TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data into shopping_cart table
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Shoes", "quantity": 1}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Shirt", "quantity": 2}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Pants", "quantity": 3}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Hat", "quantity": 1}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Socks", "quantity": 4}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Jacket", "quantity": 1}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Dress", "quantity": 2}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Belt", "quantity": 1}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Scarf", "quantity": 3}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"item": "Gloves", "quantity": 2}');
