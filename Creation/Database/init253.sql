CREATE TABLE IF NOT EXISTS clothing_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(30) NOT NULL,
    category VARCHAR(30) NOT NULL,
    size VARCHAR(10) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO clothing_items (item_name, category, size, price) VALUES 
('T-shirt', 'Shirts', 'M', 20.00),
('Jeans', 'Pants', '32', 35.00),
('Dress', 'Dresses', 'S', 50.00),
('Sweater', 'Sweaters', 'L', 45.00),
('Shorts', 'Shorts', 'XS', 15.00),
('Jacket', 'Jackets', 'XL', 60.00),
('Skirt', 'Skirts', 'M', 30.00),
('Hoodie', 'Hoodies', 'S', 40.00),
('Leggings', 'Pants', 'S', 25.00),
('Blouse', 'Blouses', 'L', 35.00);
