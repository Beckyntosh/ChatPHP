CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 1', 'Description for Product 1', 'Category1', 19.99, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 2', 'Description for Product 2', 'Category2', 24.99, 30);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 3', 'Description for Product 3', 'Category1', 14.99, 40);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 4', 'Description for Product 4', 'Category3', 29.99, 20);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 5', 'Description for Product 5', 'Category2', 22.99, 35);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 6', 'Description for Product 6', 'Category1', 16.99, 45);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 7', 'Description for Product 7', 'Category3', 27.99, 25);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 8', 'Description for Product 8', 'Category1', 18.99, 55);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 9', 'Description for Product 9', 'Category2', 21.99, 40);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product 10', 'Description for Product 10', 'Category3', 26.99, 30);
