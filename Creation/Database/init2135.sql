CREATE TABLE IF NOT EXISTS shopping_carts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    product_data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product1": "Laptop A", "quantity": 1}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product2": "Laptop B", "quantity": 3}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product3": "Laptop C", "quantity": 2}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product4": "Laptop D", "quantity": 1}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product5": "Laptop E", "quantity": 4}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product6": "Laptop F", "quantity": 2}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product7": "Laptop G", "quantity": 1}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product8": "Laptop H", "quantity": 3}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product9": "Laptop I", "quantity": 1}');
INSERT INTO shopping_carts (user_id, product_data) VALUES (1, '{"product10": "Laptop J", "quantity": 2}');