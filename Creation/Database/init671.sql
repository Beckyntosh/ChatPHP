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
CREATE TABLE IF NOT EXISTS licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file_path VARCHAR(255),
    upload_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product A', 'Description for Product A', 'Category X', 20.50, 100),
('Product B', 'Description for Product B', 'Category Y', 15.75, 75),
('Product C', 'Description for Product C', 'Category Z', 30.00, 120),
('Product D', 'Description for Product D', 'Category X', 18.99, 90),
('Product E', 'Description for Product E', 'Category Y', 25.50, 85);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', 'password123'),
('user2', 'User Two', 'user2@example.com', 'securepass'),
('user3', 'User Three', 'user3@example.com', '123456abc');

INSERT INTO licenses (user_id, file_path) VALUES
(1, 'uploads/LicenseFile1.txt'),
(2, 'uploads/LicenseFile2.txt'),
(3, 'uploads/LicenseFile3.txt');
