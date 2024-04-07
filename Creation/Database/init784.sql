CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product1', 'Description for Product 1', 'Category1', 10.99, 100);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product2', 'Description for Product 2', 'Category2', 15.99, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product3', 'Description for Product 3', 'Category1', 8.50, 75);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product4', 'Description for Product 4', 'Category3', 20.49, 120);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product5', 'Description for Product 5', 'Category2', 12.75, 85);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product6', 'Description for Product 6', 'Category1', 6.99, 200);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product7', 'Description for Product 7', 'Category3', 25.30, 150);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product8', 'Description for Product 8', 'Category2', 18.75, 90);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product9', 'Description for Product 9', 'Category1', 9.99, 110);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Product10', 'Description for Product 10', 'Category3', 30.00, 70);