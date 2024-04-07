CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, description, price) VALUES ('Product 1', 'Description of Product 1', 10.50);
INSERT INTO products (name, description, price) VALUES ('Product 2', 'Description of Product 2', 15.75);
INSERT INTO products (name, description, price) VALUES ('Product 3', 'Description of Product 3', 20.00);
INSERT INTO products (name, description, price) VALUES ('Product 4', 'Description of Product 4', 12.99);
INSERT INTO products (name, description, price) VALUES ('Product 5', 'Description of Product 5', 8.75);
INSERT INTO products (name, description, price) VALUES ('Product 6', 'Description of Product 6', 30.50);
INSERT INTO products (name, description, price) VALUES ('Product 7', 'Description of Product 7', 25.00);
INSERT INTO products (name, description, price) VALUES ('Product 8', 'Description of Product 8', 18.75);
INSERT INTO products (name, description, price) VALUES ('Product 9', 'Description of Product 9', 22.50);
INSERT INTO products (name, description, price) VALUES ('Product 10', 'Description of Product 10', 17.99);
