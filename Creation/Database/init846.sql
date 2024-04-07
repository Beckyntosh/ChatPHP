CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90);
