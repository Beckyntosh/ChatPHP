CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (product_name, product_price) VALUES ('Foundation', 12.99);
INSERT INTO products (product_name, product_price) VALUES ('Mascara', 8.50);
INSERT INTO products (product_name, product_price) VALUES ('Eyeliner', 5.99);
INSERT INTO products (product_name, product_price) VALUES ('Lipstick', 9.75);
INSERT INTO products (product_name, product_price) VALUES ('Blush', 7.25);
INSERT INTO products (product_name, product_price) VALUES ('Eye shadow palette', 20.00);
INSERT INTO products (product_name, product_price) VALUES ('Concealer', 10.50);
INSERT INTO products (product_name, product_price) VALUES ('Highlighter', 6.75);
INSERT INTO products (product_name, product_price) VALUES ('Eyebrow pencil', 4.99);
INSERT INTO products (product_name, product_price) VALUES ('Setting spray', 15.00);