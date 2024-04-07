CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_details TEXT,
  saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"items":[{"id":"1","name":"Diamond Ring"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"items":[{"id":"2","name":"Gold Necklace"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (1, '{"items":[{"id":"3","name":"Silver Bracelet"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (2, '{"items":[{"id":"1","name":"Diamond Earrings"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (2, '{"items":[{"id":"2","name":"Ruby Ring"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (3, '{"items":[{"id":"3","name":"Pearl Necklace"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (3, '{"items":[{"id":"1","name":"Sapphire Bracelet"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (4, '{"items":[{"id":"2","name":"Emerald Ring"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (4, '{"items":[{"id":"3","name":"Rose Gold Earrings"}]}');
INSERT INTO shopping_cart (user_id, product_details) VALUES (5, '{"items":[{"id":"1","name":"Platinum Necklace"}]}');
