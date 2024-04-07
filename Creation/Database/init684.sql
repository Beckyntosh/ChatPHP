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
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product A', 'Description A', 'Category A', 10.99, 100),
('Product B', 'Description B', 'Category B', 20.55, 50),
('Product C', 'Description C', 'Category C', 15.75, 75),
('Product D', 'Description D', 'Category D', 30.25, 25),
('Product E', 'Description E', 'Category E', 25.00, 60),
('Product F', 'Description F', 'Category A', 12.49, 90),
('Product G', 'Description G', 'Category B', 18.75, 40),
('Product H', 'Description H', 'Category C', 22.99, 70),
('Product I', 'Description I', 'Category D', 35.00, 30),
('Product J', 'Description J', 'Category E', 28.50, 80);

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

INSERT INTO uploads (filename) VALUES
('file1.csv'),
('file2.csv'),
('file3.csv'),
('file4.csv'),
('file5.csv'),
('file6.csv'),
('file7.csv'),
('file8.csv'),
('file9.csv'),
('file10.csv');
