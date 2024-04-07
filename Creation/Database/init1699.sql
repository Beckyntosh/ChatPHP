CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, category, price) VALUES
('iPhone 13', 'Apple iPhone 13, latest model.', 'Smartphones', 799.99),
('Samsung Galaxy S21', 'Samsung Galaxy S21, high-end model.', 'Smartphones', 699.99),
('HP Laptop', 'HP Laptop with high performance.', 'Laptops', 999.99),
('Sony TV', 'Sony 4K Smart TV.', 'TVs', 1499.99),
('Toyota Camry', 'Toyota Camry 2022 model.', 'Cars', 27999.99),
('Sony PlayStation 5', 'Latest gaming console from Sony.', 'Gaming Consoles', 499.99),
('Nike Air Max', 'Nike Air Max shoes.', 'Shoes', 129.99),
('Samsung Refrigerator', 'Samsung 4-door refrigerator.', 'Appliances', 1999.99),
('Dell Monitor', 'Dell 27-inch monitor.', 'Monitors', 299.99),
('Amazon Echo', 'Amazon Echo smart speaker.', 'Smart Home', 79.99)
ON DUPLICATE KEY UPDATE name=name;
