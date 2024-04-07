CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    amount DECIMAL(10,2),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO transactions (user_id, product_id, amount) VALUES (1, 1, 50.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (2, 2, 75.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (3, 1, 60.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (4, 3, 100.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (5, 2, 80.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (6, 1, 55.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (7, 3, 95.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (8, 1, 70.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (9, 2, 85.00);
INSERT INTO transactions (user_id, product_id, amount) VALUES (10, 3, 110.00);
