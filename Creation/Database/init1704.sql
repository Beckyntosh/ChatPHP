CREATE TABLE Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    screen_size VARCHAR(30) NOT NULL,
    cpu VARCHAR(30) NOT NULL,
    ram INT(11) NOT NULL,
    storage VARCHAR(50) NOT NULL,
    battery_capacity VARCHAR(30) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO Products (name, screen_size, cpu, ram, storage, battery_capacity, price) 
VALUES 
('iPhone 13', '6.1 inches', 'A15 Bionic', 6, '128GB', '2815 mAh', 799.00),
('Samsung Galaxy S21', '6.2 inches', 'Exynos 2100', 8, '128GB', '4000 mAh', 799.99),
('OnePlus 9 Pro', '6.7 inches', 'Snapdragon 888', 12, '256GB', '4500 mAh', 1069.00),
('Google Pixel 6 Pro', '6.7 inches', 'Tensor', 12, '128GB', '5003 mAh', 899.00),
('Xiaomi Mi 11 Ultra', '6.81 inches', 'Snapdragon 888', 12, '512GB', '5000 mAh', 1199.00),
('Sony Xperia 1 III', '6.5 inches', 'Snapdragon 888', 12, '256GB', '4500 mAh', 1298.00),
('Huawei P50 Pro', '6.6 inches', 'Kirin 9000', 8, '256GB', '4362 mAh', 1199.99),
('Oppo Find X3 Pro', '6.7 inches', 'Snapdragon 888', 12, '256GB', '4500 mAh', 1149.00),
('LG Velvet', '6.8 inches', 'Snapdragon 765G', 8, '128GB', '4300 mAh', 599.00),
('ASUS ROG Phone 5', '6.78 inches', 'Snapdragon 888', 16, '512GB', '6000 mAh', 999.00);