CREATE TABLE IF NOT EXISTS wishlist (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
item_name VARCHAR(255) NOT NULL,
item_price DECIMAL(10, 2) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Nike Air Max', 150.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Adidas Ultraboost', 180.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Vans Old Skool', 65.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Converse Chuck Taylor', 50.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Puma Suede Classic', 70.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Reebok Classic Leather', 80.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'New Balance 574', 90.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Asics Gel-Lyte III', 120.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Brooks Ghost', 140.00);
INSERT INTO wishlist (user_id, item_name, item_price) VALUES (1, 'Saucony Shadow 5000', 110.00);
