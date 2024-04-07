CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(30) NOT NULL,
    item_price DECIMAL(10, 2) NOT NULL,
    user_id INT(6) UNSIGNED,
    added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO wishlist (item_name, item_price, user_id) VALUES ('Cool Cyberpunk Shoes', 99.99, 123),
('Neon Cyberpunk Boots', 79.99, 456),
('Techwear Sneakers', 129.99, 789),
('Futuristic Heels', 59.99, 123),
('LED Light Up Shoes', 49.99, 456),
('Holographic High Tops', 89.99, 789),
('Cyberpunk Ankle Boots', 69.99, 123),
('Digital Print Sneakers', 109.99, 456),
('Metallic Platform Boots', 79.99, 789),
('Space Age Sandals', 39.99, 123);
