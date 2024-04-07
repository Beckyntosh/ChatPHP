CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
brand VARCHAR(30) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Products (name, brand, description, price) VALUES ('iPhone 13', 'Apple', 'Latest iPhone model', 799.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Samsung Galaxy S21', 'Samsung', 'Flagship Samsung smartphone', 899.99);
INSERT INTO Products (name, brand, description, price) VALUES ('MacBook Pro', 'Apple', 'High-performance laptop by Apple', 1499.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Pixel 6', 'Google', 'Googles latest smartphone', 699.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Surface Laptop 4', 'Microsoft', 'Premium laptop by Microsoft', 1299.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Sony A7 III', 'Sony', 'Mirrorless camera by Sony', 1999.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Bose QuietComfort 45', 'Bose', 'Wireless noise-cancelling headphones', 349.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Xbox Series X', 'Microsoft', 'Latest gaming console by Microsoft', 499.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Dyson V11', 'Dyson', 'Cordless vacuum cleaner', 599.99);
INSERT INTO Products (name, brand, description, price) VALUES ('Nintendo Switch', 'Nintendo', 'Hybrid gaming console', 299.99);
