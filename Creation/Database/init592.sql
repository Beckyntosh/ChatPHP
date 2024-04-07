CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, description, price) VALUES ('Product 1', 'Description 1', 10.99);
INSERT INTO products (name, description, price) VALUES ('Product 2', 'Description 2', 15.50);
INSERT INTO products (name, description, price) VALUES ('Product 3', 'Description 3', 20.00);
INSERT INTO products (name, description, price) VALUES ('Product 4', 'Description 4', 8.75);
INSERT INTO products (name, description, price) VALUES ('Product 5', 'Description 5', 12.99);
INSERT INTO products (name, description, price) VALUES ('Product 6', 'Description 6', 18.49);
INSERT INTO products (name, description, price) VALUES ('Product 7', 'Description 7', 25.00);
INSERT INTO products (name, description, price) VALUES ('Product 8', 'Description 8', 9.99);
INSERT INTO products (name, description, price) VALUES ('Product 9', 'Description 9', 14.75);
INSERT INTO products (name, description, price) VALUES ('Product 10', 'Description 10', 22.50);
