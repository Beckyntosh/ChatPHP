CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
product_price DECIMAL(10,2) NOT NULL,
product_description TEXT,
registration_date TIMESTAMP
);

INSERT INTO products (product_name, product_price, product_description) VALUES
('Product 1', 20.50, 'Description 1'),
('Product 2', 15.75, 'Description 2'),
('Product 3', 30.00, 'Description 3'),
('Product 4', 10.99, 'Description 4'),
('Product 5', 25.49, 'Description 5'),
('Product 6', 18.25, 'Description 6'),
('Product 7', 12.75, 'Description 7'),
('Product 8', 40.00, 'Description 8'),
('Product 9', 22.99, 'Description 9'),
('Product 10', 17.50, 'Description 10');