CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, description, price) VALUES ('Product 1', 'Description of Product 1', 25.00);
INSERT INTO products (name, description, price) VALUES ('Product 2', 'Description of Product 2', 30.00);
INSERT INTO products (name, description, price) VALUES ('Product 3', 'Description of Product 3', 40.00);
INSERT INTO products (name, description, price) VALUES ('Product 4', 'Description of Product 4', 20.00);
INSERT INTO products (name, description, price) VALUES ('Product 5', 'Description of Product 5', 35.00);
INSERT INTO products (name, description, price) VALUES ('Product 6', 'Description of Product 6', 15.00);
INSERT INTO products (name, description, price) VALUES ('Product 7', 'Description of Product 7', 50.00);
INSERT INTO products (name, description, price) VALUES ('Product 8', 'Description of Product 8', 45.00);
INSERT INTO products (name, description, price) VALUES ('Product 9', 'Description of Product 9', 60.00);
INSERT INTO products (name, description, price) VALUES ('Product 10', 'Description of Product 10', 55.00);
