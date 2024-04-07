CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    custom_size VARCHAR(50) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); 

INSERT INTO orders (product_name, custom_size) VALUES ('Chair', 'Standard');
INSERT INTO orders (product_name, custom_size) VALUES ('Desk', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Bookshelf', 'Medium');
INSERT INTO orders (product_name, custom_size) VALUES ('Lamp', 'Small');
INSERT INTO orders (product_name, custom_size) VALUES ('Rug', 'Custom');
INSERT INTO orders (product_name, custom_size) VALUES ('Table', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Shelves', 'Standard');
INSERT INTO orders (product_name, custom_size) VALUES ('Cabinet', 'Custom');
INSERT INTO orders (product_name, custom_size) VALUES ('Mirror', 'Small');
INSERT INTO orders (product_name, custom_size) VALUES ('Bed', 'King Size');
