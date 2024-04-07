CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product 1', 'Description for Product 1', 'Category A', 10.99, 100),
('Product 2', 'Description for Product 2', 'Category B', 15.99, 50),
('Product 3', 'Description for Product 3', 'Category A', 12.50, 75),
('Product 4', 'Description for Product 4', 'Category C', 20.50, 25),
('Product 5', 'Description for Product 5', 'Category B', 18.75, 80),
('Product 6', 'Description for Product 6', 'Category A', 9.99, 120),
('Product 7', 'Description for Product 7', 'Category C', 22.25, 40),
('Product 8', 'Description for Product 8', 'Category B', 16.50, 60),
('Product 9', 'Description for Product 9', 'Category A', 14.75, 90),
('Product 10', 'Description for Product 10', 'Category C', 24.99, 30);