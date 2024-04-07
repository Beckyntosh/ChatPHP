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
    file_name VARCHAR(255),
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id)
    ON DELETE CASCADE
);

INSERT INTO products (name, description, category, price, stock_quantity) 
VALUES ('Product 1', 'Description 1', 'Category 1', 10.99, 100),
('Product 2', 'Description 2', 'Category 2', 20.50, 50),
('Product 3', 'Description 3', 'Category 1', 15.75, 75),
('Product 4', 'Description 4', 'Category 3', 30.25, 25),
('Product 5', 'Description 5', 'Category 2', 12.00, 200);

INSERT INTO users (username, name, email, password)
VALUES ('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3'),
('user4', 'User Four', 'user4@example.com', 'password4'),
('user5', 'User Five', 'user5@example.com', 'password5');

INSERT INTO uploads (user_id, file_name)
VALUES (1, 'file1.pdf'),
(2, 'file2.png'),
(3, 'file3.docx'),
(2, 'file4.jpg'),
(1, 'file5.txt');

