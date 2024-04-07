CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    img_url VARCHAR(255)
);

CREATE TABLE presentations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    location VARCHAR(255)
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'john.doe@example.com', 'password123'),
('Jane Smith', 'jane.smith@example.com', 'password456'),
('Alice Johnson', 'alice.johnson@example.com', 'password789'),
('Bob Brown', 'bob.brown@example.com', 'passwordabc'),
('Eva Wilson', 'eva.wilson@example.com', 'passworddef');

INSERT INTO products (name, description, img_url) VALUES ('Product 1', 'Description for Product 1', 'img/product1.jpg'),
('Product 2', 'Description for Product 2', 'img/product2.jpg'),
('Product 3', 'Description for Product 3', 'img/product3.jpg'),
('Product 4', 'Description for Product 4', 'img/product4.jpg'),
('Product 5', 'Description for Product 5', 'img/product5.jpg');

INSERT INTO presentations (file_name, location) VALUES ('Presentation 1', 'uploads/presentation1.pdf'),
('Presentation 2', 'uploads/presentation2.pdf'),
('Presentation 3', 'uploads/presentation3.pdf');
