CREATE TABLE IF NOT EXISTS shopping_carts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    cart_data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO shopping_carts (user_id, cart_data) VALUES (1, '{"item": "Skateboard", "price": 50}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (2, '{"item": "Longboard", "price": 70}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (3, '{"item": "Cruiser", "price": 60}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (4, '{"item": "Penny Board", "price": 45}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (5, '{"item": "Electric Skateboard", "price": 200}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (6, '{"item": "Skateboard Wheels", "price": 20}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (7, '{"item": "Skateboard Trucks", "price": 30}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (8, '{"item": "Skateboard Bearings", "price": 15}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (9, '{"item": "Skateboard Grip Tape", "price": 10}');
INSERT INTO shopping_carts (user_id, cart_data) VALUES (10, '{"item": "Skateboard Helmet", "price": 35}');
