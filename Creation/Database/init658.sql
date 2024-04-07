CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE IF NOT EXISTS users (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(30) NOT NULL,
   file_path VARCHAR(100) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123'),
('jane_smith', 'qwerty456'),
('admin', 'adminpass');

INSERT INTO products (name, file_path) VALUES ('product1', 'uploads/product1.svg'),
('product2', 'uploads/product2.svg'),
('product3', 'uploads/product3.svg'),
('product4', 'uploads/product4.svg'),
('product5', 'uploads/product5.svg'),
('product6', 'uploads/product6.svg'),
('product7', 'uploads/product7.svg'),
('product8', 'uploads/product8.svg'),
('product9', 'uploads/product9.svg'),
('product10', 'uploads/product10.svg');
