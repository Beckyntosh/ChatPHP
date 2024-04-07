CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT NOT NULL
);

INSERT INTO users (username, name, email, password) VALUES 
('john_doe', 'John Doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'Jane Smith', 'jane.smith@example.com', 'letmein'),
('sam_wilson', 'Sam Wilson', 'sam.wilson@example.com', 'p@ssw0rd');

INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
('Product A', 'Description for Product A', 'Category 1', 99.99, 50),
('Product B', 'Description for Product B', 'Category 2', 49.99, 100),
('Product C', 'Description for Product C', 'Category 1', 149.99, 25),
('Product D', 'Description for Product D', 'Category 3', 199.99, 10),
('Product E', 'Description for Product E', 'Category 2', 29.99, 75),
('Product F', 'Description for Product F', 'Category 1', 79.99, 40),
('Product G', 'Description for Product G', 'Category 3', 149.99, 30),
('Product H', 'Description for Product H', 'Category 2', 39.99, 60),
('Product I', 'Description for Product I', 'Category 1', 199.99, 20),
('Product J', 'Description for Product J', 'Category 3', 129.99, 35);
