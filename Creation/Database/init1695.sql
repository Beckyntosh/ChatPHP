CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
productType VARCHAR(30) NOT NULL,
price DECIMAL(10,2) NOT NULL,
description TEXT,
reg_date TIMESTAMP
);

INSERT INTO products (productName, productType, price, description) VALUES 
('Nike Running Shoes', 'Sporting Goods', 99.99, 'Lightweight and comfortable shoes for running'),
('Adidas Soccer Ball', 'Sporting Goods', 19.99, 'High-quality soccer ball for training and matches'),
('Yoga Mat', 'Sporting Goods', 29.99, 'Non-slip yoga mat for home workouts'),
('Dumbbell Set', 'Sporting Goods', 49.99, 'Adjustable set of dumbbells for strength training'),
('Fitness Tracker Watch', 'Sporting Goods', 79.99, 'Track your fitness goals and monitor your heart rate'),
('Outdoor Camping Tent', 'Sporting Goods', 149.99, 'Spacious tent for outdoor camping adventures'),
('Basketball Hoop', 'Sporting Goods', 199.99, 'Durable and adjustable basketball hoop for driveway games'),
('Golf Club Set', 'Sporting Goods', 299.99, 'Complete set of golf clubs for beginners and pros'),
('Tennis Racket', 'Sporting Goods', 89.99, 'Professional tennis racket for improved performance'),
('Swimming Goggles', 'Sporting Goods', 14.99, 'Comfortable goggles for underwater visibility');