CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    rating INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES products(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
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