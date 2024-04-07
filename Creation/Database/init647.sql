CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255),
    productPrice DECIMAL(10, 2)
);

INSERT INTO products (productName, productPrice) VALUES 
('Foundation', 25.99),
('Eyeshadow Palette', 19.99),
('Mascara', 9.99),
('Lipstick', 12.50),
('Blush', 15.00),
('Eyeliner', 8.75),
('Highlighter', 18.50),
('Concealer', 10.99),
('Bronzer', 14.75),
('Setting Spray', 21.25);