CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    brand VARCHAR(30),
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
);

-- Insert values into products table
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('iPhone 13', 'Apple', 999.99, 'Latest iPhone model', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Samsung Galaxy S21', 'Samsung', 899.99, 'Latest Samsung flagship', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('LG OLED TV', 'LG', 1499.99, 'High-end OLED TV', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('HP Spectre x360', 'HP', 1299.99, 'Premium convertible laptop', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Sony WH-1000XM4', 'Sony', 349.99, 'Top-rated noise-cancelling headphones', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Dyson V11 Vacuum', 'Dyson', 599.99, 'Powerful cordless vacuum cleaner', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Nespresso VertuoPlus', 'Nespresso', 179.99, 'Coffee machine with espresso and coffee options', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Nintendo Switch', 'Nintendo', 299.99, 'Hybrid gaming console', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Logitech MX Master 3', 'Logitech', 99.99, 'Advanced wireless mouse', NOW());
INSERT INTO products (product_name, brand, price, description, reg_date) VALUES ('Dell U2719D Monitor', 'Dell', 349.99, '27-inch QHD monitor', NOW());
