CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    img_url VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS carts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    total DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id INT(6)
);

CREATE TABLE IF NOT EXISTS cart_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cart_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    quantity INT(6),
    FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

INSERT INTO products (name, price, description, img_url)
VALUES ('Product 1', '20.00', 'Description for Product 1', 'img/product1.jpg'),
       ('Product 2', '15.50', 'Description for Product 2', 'img/product2.jpg'),
       ('Product 3', '30.25', 'Description for Product 3', 'img/product3.jpg'),
       ('Product 4', '12.75', 'Description for Product 4', 'img/product4.jpg'),
       ('Product 5', '18.90', 'Description for Product 5', 'img/product5.jpg'),
       ('Product 6', '25.40', 'Description for Product 6', 'img/product6.jpg'),
       ('Product 7', '10.00', 'Description for Product 7', 'img/product7.jpg'),
       ('Product 8', '22.75', 'Description for Product 8', 'img/product8.jpg'),
       ('Product 9', '13.50', 'Description for Product 9', 'img/product9.jpg'),
       ('Product 10', '19.99', 'Description for Product 10', 'img/product10.jpg');

INSERT INTO carts (total, user_id)
VALUES ('50.25', '1'),
       ('75.60', '2'),
       ('30.00', '3'),
       ('45.75', '1'),
       ('22.40', '2'),
       ('68.90', '3'),
       ('15.00', '1'),
       ('35.75', '2'),
       ('32.50', '3'),
       ('50.99', '1');
