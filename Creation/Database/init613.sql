CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
('Product1', 'Description1', 'Category1', 10.99, 50),
('Product2', 'Description2', 'Category2', 20.50, 30),
('Product3', 'Description3', 'Category3', 15.75, 40),
('Product4', 'Description4', 'Category1', 5.25, 60),
('Product5', 'Description5', 'Category2', 8.99, 70),
('Product6', 'Description6', 'Category3', 12.49, 25),
('Product7', 'Description7', 'Category1', 18.75, 35),
('Product8', 'Description8', 'Category2', 22.99, 20),
('Product9', 'Description9', 'Category3', 16.50, 45),
('Product10', 'Description10', 'Category1', 9.99, 55);

INSERT INTO users (username, name, email, password) VALUES 
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3'),
('user4', 'User Four', 'user4@example.com', 'password4'),
('user5', 'User Five', 'user5@example.com', 'password5'),
('user6', 'User Six', 'user6@example.com', 'password6'),
('user7', 'User Seven', 'user7@example.com', 'password7'),
('user8', 'User Eight', 'user8@example.com', 'password8'),
('user9', 'User Nine', 'user9@example.com', 'password9'),
('user10', 'User Ten', 'user10@example.com', 'password10');