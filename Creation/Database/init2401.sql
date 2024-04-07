CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
product_id INT(6) UNSIGNED,
view_date TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
style VARCHAR(50) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL
);

INSERT INTO users (email, reg_date) VALUES 
('user1@example.com', NOW()),
('user2@example.com', NOW()),
('user3@example.com', NOW()),
('user4@example.com', NOW()),
('user5@example.com', NOW());

INSERT INTO browsing_history (user_id, product_id, view_date) VALUES 
(1, 1, NOW()),
(1, 2, NOW()),
(2, 3, NOW()),
(2, 4, NOW()),
(3, 1, NOW()),
(3, 2, NOW()),
(4, 4, NOW()),
(4, 5, NOW()),
(5, 3, NOW()),
(5, 5, NOW());

INSERT INTO products (name, style, description, price) VALUES 
('Handbag1', 'modular', 'This is Handbag1', 50.00),
('Handbag2', 'modular', 'This is Handbag2', 55.00),
('Handbag3', 'modular', 'This is Handbag3', 60.00),
('Handbag4', 'modular', 'This is Handbag4', 65.00),
('Handbag5', 'modular', 'This is Handbag5', 70.00);
