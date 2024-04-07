CREATE TABLE IF NOT EXISTS presentations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        file_path VARCHAR(255),
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT,
        productName VARCHAR(255),
        productPrice DECIMAL(10, 2),
        productDescription TEXT,
        image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
);

INSERT INTO presentations (title, file_path) VALUES ('Presentation 1', '/path/to/file1.pdf');
INSERT INTO presentations (title, file_path) VALUES ('Presentation 2', '/path/to/file2.pdf');
INSERT INTO products (name, description, category, price, stock_quantity, productName, productPrice, productDescription, image) VALUES ('Product 1', 'Description 1', 'Category 1', 20.00, 50, 'Product 1 Name', 19.99, 'Product 1 Description', '/path/to/image1.jpg');
INSERT INTO products (name, description, category, price, stock_quantity, productName, productPrice, productDescription, image) VALUES ('Product 2', 'Description 2', 'Category 2', 30.00, 30, 'Product 2 Name', 29.99, 'Product 2 Description', '/path/to/image2.jpg');
INSERT INTO users (username, name, email, password) VALUES ('user1', 'User One', 'user1@example.com', 'password1');
INSERT INTO users (username, name, email, password) VALUES ('user2', 'User Two', 'user2@example.com', 'password2');