CREATE TABLE IF NOT EXISTS shoes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    size DECIMAL(5, 2) NOT NULL,
    color VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO shoes (name, brand, price, size, color) VALUES 
('Nike Air Max', 'Nike', 129.99, 9.5, 'Black'),
('Adidas UltraBoost', 'Adidas', 159.99, 10.0, 'White'),
('Puma RS-X', 'Puma', 89.99, 8.0, 'Red'),
('New Balance 990v5', 'New Balance', 174.99, 9.0, 'Gray'),
('Reebok Nano X', 'Reebok', 119.99, 10.5, 'Blue'),
('Asics Gel-Kayano 27', 'Asics', 149.99, 9.5, 'Green'),
('Brooks Ghost 13', 'Brooks', 129.99, 8.5, 'Purple'),
('Under Armour HOVR Machina', 'Under Armour', 139.99, 9.0, 'Yellow'),
('Saucony Triumph 18', 'Saucony', 159.99, 10.0, 'Orange'),
('Hoka One One Clifton 7', 'Hoka One One', 129.99, 8.0, 'Pink');
