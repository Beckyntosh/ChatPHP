CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    custom_size VARCHAR(100) NOT NULL,
    quantity INT(11) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Wooden Dining Table', '4ft x 6ft', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Laptop', '15 inches', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Smartphone', '128GB', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Headphones', 'Wireless', 3);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Television', '55 inches', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Coffee Table', 'Square', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Bed Frame', 'Queen Size', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Dining Chairs', 'Set of 4', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Rug', '8ft x 10ft', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Desk', 'L-shaped', 1);
