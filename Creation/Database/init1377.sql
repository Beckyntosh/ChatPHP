CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(50),
    quantity INT(3) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (product_name, custom_size, quantity) VALUES ('wooden dining table', 'custom1', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('chair', NULL, 4);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('bed', 'queen size', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('bookshelf', NULL, 3);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('desk', 'adjustable height', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('couch', 'leather', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('table lamp', 'LED', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('rugs', '8x10', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('curtains', 'blackout', 5);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('coffee table', NULL, 1);