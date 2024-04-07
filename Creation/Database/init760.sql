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

CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    bio TEXT,
    website VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product1', 'Description1', 'Category1', 10.99, 20),
('Product2', 'Description2', 'Category2', 15.99, 15),
('Product3', 'Description3', 'Category1', 8.99, 30),
('Product4', 'Description4', 'Category3', 20.50, 10),
('Product5', 'Description5', 'Category2', 12.75, 25),
('Product6', 'Description6', 'Category1', 9.99, 18),
('Product7', 'Description7', 'Category3', 25.00, 12),
('Product8', 'Description8', 'Category2', 14.50, 22),
('Product9', 'Description9', 'Category1', 11.75, 28),
('Product10', 'Description10', 'Category3', 30.99, 8);

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

INSERT INTO profiles (user_id, bio, website) VALUES
(1, 'Bio1', 'http://website1.com'),
(2, 'Bio2', 'http://website2.com'),
(3, 'Bio3', 'http://website3.com'),
(4, 'Bio4', 'http://website4.com'),
(5, 'Bio5', 'http://website5.com'),
(6, 'Bio6', 'http://website6.com'),
(7, 'Bio7', 'http://website7.com'),
(8, 'Bio8', 'http://website8.com'),
(9, 'Bio9', 'http://website9.com'),
(10, 'Bio10', 'http://website10.com');
