CREATE TABLE IF NOT EXISTS shopping_cart (
    cart_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    product_data TEXT,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO shopping_cart (user_id, product_data) VALUES (1, '{"item": "Vinyl record 1", "price": 20}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (2, '{"item": "Vinyl record 2", "price": 25}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (3, '{"item": "Vinyl record 3", "price": 18}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (1, '{"item": "Vinyl record 4", "price": 30}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (4, '{"item": "Vinyl record 5", "price": 22}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (5, '{"item": "Vinyl record 6", "price": 28}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (2, '{"item": "Vinyl record 7", "price": 35}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (3, '{"item": "Vinyl record 8", "price": 40}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (4, '{"item": "Vinyl record 9", "price": 45}');
INSERT INTO shopping_cart (user_id, product_data) VALUES (5, '{"item": "Vinyl record 10", "price": 50}');
