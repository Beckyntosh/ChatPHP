CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    rating DECIMAL(2, 1) NOT NULL
);

INSERT INTO products (name, category, price, rating) VALUES ('Product 1', 'Category A', 100.00, 4.5);
INSERT INTO products (name, category, price, rating) VALUES ('Product 2', 'Category B', 150.00, 4.2);
INSERT INTO products (name, category, price, rating) VALUES ('Product 3', 'Category A', 120.00, 4.0);
INSERT INTO products (name, category, price, rating) VALUES ('Product 4', 'Category C', 200.00, 4.8);
INSERT INTO products (name, category, price, rating) VALUES ('Product 5', 'Category B', 180.00, 4.3);
INSERT INTO products (name, category, price, rating) VALUES ('Product 6', 'Category A', 90.00, 4.7);
INSERT INTO products (name, category, price, rating) VALUES ('Product 7', 'Category B', 160.00, 4.6);
INSERT INTO products (name, category, price, rating) VALUES ('Product 8', 'Category C', 220.00, 4.9);
INSERT INTO products (name, category, price, rating) VALUES ('Product 9', 'Category A', 110.00, 4.4);
INSERT INTO products (name, category, price, rating) VALUES ('Product 10', 'Category B', 140.00, 4.1);
