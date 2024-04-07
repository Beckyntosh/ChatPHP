CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);

CREATE TABLE images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) UNSIGNED,
    file_name VARCHAR(255) NOT NULL,
    file_location VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, price, description) VALUES ('Product 1', 25.99, 'Description for Product 1');
INSERT INTO products (name, price, description) VALUES ('Product 2', 39.99, 'Description for Product 2');
INSERT INTO products (name, price, description) VALUES ('Product 3', 15.50, 'Description for Product 3');
INSERT INTO products (name, price, description) VALUES ('Product 4', 50.00, 'Description for Product 4');
INSERT INTO products (name, price, description) VALUES ('Product 5', 75.25, 'Description for Product 5');
INSERT INTO products (name, price, description) VALUES ('Product 6', 19.99, 'Description for Product 6');
INSERT INTO products (name, price, description) VALUES ('Product 7', 29.75, 'Description for Product 7');
INSERT INTO products (name, price, description) VALUES ('Product 8', 10.00, 'Description for Product 8');
INSERT INTO products (name, price, description) VALUES ('Product 9', 45.50, 'Description for Product 9');
INSERT INTO products (name, price, description) VALUES ('Product 10', 55.75, 'Description for Product 10');

INSERT INTO images (product_id, file_name, file_location) VALUES (1, 'product1.jpg', 'uploads/product1.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (2, 'product2.jpg', 'uploads/product2.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (3, 'product3.jpg', 'uploads/product3.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (4, 'product4.jpg', 'uploads/product4.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (5, 'product5.jpg', 'uploads/product5.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (6, 'product6.jpg', 'uploads/product6.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (7, 'product7.jpg', 'uploads/product7.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (8, 'product8.jpg', 'uploads/product8.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (9, 'product9.jpg', 'uploads/product9.jpg');
INSERT INTO images (product_id, file_name, file_location) VALUES (10, 'product10.jpg', 'uploads/product10.jpg');
