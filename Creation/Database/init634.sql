CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (name, price) VALUES ('Foundation', 20.00);
INSERT INTO products (name, price) VALUES ('Eyeshadow Palette', 25.50);
INSERT INTO products (name, price) VALUES ('Mascara', 10.00);
INSERT INTO products (name, price) VALUES ('Lipstick', 15.75);
INSERT INTO products (name, price) VALUES ('Blush', 12.99);
INSERT INTO products (name, price) VALUES ('Highlighter', 18.50);
INSERT INTO products (name, price) VALUES ('Concealer', 16.25);
INSERT INTO products (name, price) VALUES ('Bronzer', 14.00);
INSERT INTO products (name, price) VALUES ('Setting Spray', 22.50);
INSERT INTO products (name, price) VALUES ('Eyeliner', 8.99);
