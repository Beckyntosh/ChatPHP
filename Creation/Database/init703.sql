CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO products (name, description, price) VALUES 
('Product 1', 'Description of Product 1', 10.99),
('Product 2', 'Description of Product 2', 20.99),
('Product 3', 'Description of Product 3', 15.49),
('Product 4', 'Description of Product 4', 8.99),
('Product 5', 'Description of Product 5', 12.79),
('Product 6', 'Description of Product 6', 18.99),
('Product 7', 'Description of Product 7', 25.99),
('Product 8', 'Description of Product 8', 9.99),
('Product 9', 'Description of Product 9', 14.50),
('Product 10', 'Description of Product 10', 17.99);
