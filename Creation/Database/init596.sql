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

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 1', 'Description 1', 'Category 1', 25.99, 100);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 2', 'Description 2', 'Category 2', 19.99, 75);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 3', 'Description 3', 'Category 1', 39.99, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 4', 'Description 4', 'Category 3', 49.99, 120);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 5', 'Description 5', 'Category 2', 29.99, 80);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 6', 'Description 6', 'Category 1', 34.99, 90);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 7', 'Description 7', 'Category 3', 44.99, 110);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 8', 'Description 8', 'Category 2', 22.99, 65);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 9', 'Description 9', 'Category 1', 27.99, 85);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 10', 'Description 10', 'Category 3', 47.99, 105);
