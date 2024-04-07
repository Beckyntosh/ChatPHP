
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

CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product 1', 'Description 1', 'Category A', 10.50, 100),
('Product 2', 'Description 2', 'Category B', 20.75, 50),
('Product 3', 'Description 3', 'Category C', 30.30, 75),
('Product 4', 'Description 4', 'Category A', 12.99, 200),
('Product 5', 'Description 5', 'Category B', 18.75, 30);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3'),
('user4', 'User Four', 'user4@example.com', 'password4'),
('user5', 'User Five', 'user5@example.com', 'password5');

INSERT INTO uploads (user_id, filename) VALUES
(1, 'file1.pdf'),
(2, 'file2.pdf'),
(3, 'file3.pdf'),
(4, 'file4.pdf'),
(5, 'file5.pdf');
