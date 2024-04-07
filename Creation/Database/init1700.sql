CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
brand VARCHAR(30) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Comparisons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id1 INT(6) UNSIGNED,
product_id2 INT(6) UNSIGNED,
comparison_date TIMESTAMP,
FOREIGN KEY (product_id1) REFERENCES Products(id),
FOREIGN KEY (product_id2) REFERENCES Products(id)
);

INSERT INTO Products (name, brand, description, price) VALUES 
('iPhone 13', 'Apple', 'The latest smartphone from Apple', 999.99),
('Samsung Galaxy S21', 'Samsung', 'Flagship smartphone from Samsung', 899.99),
('Pixel 5', 'Google', 'Google''s flagship smartphone', 799.99),
('OnePlus 9 Pro', 'OnePlus', 'High-end smartphone from OnePlus', 1099.99),
('Galaxy Watch 4', 'Samsung', 'Samsung''s latest smartwatch', 349.99),
('Fitbit Charge 5', 'Fitbit', 'Advanced fitness tracker from Fitbit', 179.99),
('AirPods Pro', 'Apple', 'Premium wireless earbuds from Apple', 249.99),
('Sony WH-1000XM4', 'Sony', 'High-quality noise-canceling headphones', 349.99),
('Nintendo Switch', 'Nintendo', 'Popular gaming console from Nintendo', 299.99),
('Amazon Echo Dot', 'Amazon', 'Smart speaker with Alexa', 49.99);