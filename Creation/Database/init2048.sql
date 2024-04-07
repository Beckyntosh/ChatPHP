CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, brand, description, price) VALUES ('Product 1', 'Brand 1', 'Description 1', 10.99);
INSERT INTO products (name, brand, description, price) VALUES ('Product 2', 'Brand 2', 'Description 2', 19.99);
INSERT INTO products (name, brand, description, price) VALUES ('Product 3', 'Brand 3', 'Description 3', 15.50);
INSERT INTO products (name, brand, description, price) VALUES ('Product 4', 'Brand 4', 'Description 4', 25.00);
INSERT INTO products (name, brand, description, price) VALUES ('Product 5', 'Brand 5', 'Description 5', 30.49);
INSERT INTO products (name, brand, description, price) VALUES ('Product 6', 'Brand 6', 'Description 6', 12.75);
INSERT INTO products (name, brand, description, price) VALUES ('Product 7', 'Brand 7', 'Description 7', 7.99);
INSERT INTO products (name, brand, description, price) VALUES ('Product 8', 'Brand 8', 'Description 8', 22.87);
INSERT INTO products (name, brand, description, price) VALUES ('Product 9', 'Brand 9', 'Description 9', 18.33);
INSERT INTO products (name, brand, description, price) VALUES ('Product 10', 'Brand 10', 'Description 10', 14.20);
