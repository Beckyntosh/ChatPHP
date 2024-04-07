CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product 1', 'Description for Product 1', 'Category A', 20.50, 100),
('Product 2', 'Description for Product 2', 'Category B', 15.75, 50),
('Product 3', 'Description for Product 3', 'Category A', 30.00, 75),
('Product 4', 'Description for Product 4', 'Category C', 12.25, 120),
('Product 5', 'Description for Product 5', 'Category B', 18.99, 80);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3'),
('user4', 'User Four', 'user4@example.com', 'password4'),
('user5', 'User Five', 'user5@example.com', 'password5');