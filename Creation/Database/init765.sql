CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    productId INT,
    rating INT
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

INSERT INTO products (name) VALUES ('Product 1');
INSERT INTO products (name) VALUES ('Product 2');
INSERT INTO products (name) VALUES ('Product 3');
INSERT INTO products (name) VALUES ('Product 4');
INSERT INTO products (name) VALUES ('Product 5');
INSERT INTO products (name) VALUES ('Product 6');
INSERT INTO products (name) VALUES ('Product 7');
INSERT INTO products (name) VALUES ('Product 8');
INSERT INTO products (name) VALUES ('Product 9');
INSERT INTO products (name) VALUES ('Product 10');
