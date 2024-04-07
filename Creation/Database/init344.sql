CREATE TABLE IF NOT EXISTS Orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    status VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS OrderDetails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    quantity INT(3) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(id)
);

INSERT INTO Orders (user_id, status) VALUES (1, 'Pending');
INSERT INTO Orders (user_id, status) VALUES (1, 'Delivered');
INSERT INTO Orders (user_id, status) VALUES (2, 'Pending');
INSERT INTO Orders (user_id, status) VALUES (2, 'Processing');
INSERT INTO Orders (user_id, status) VALUES (3, 'Delivered');

INSERT INTO OrderDetails (order_id, product_name, quantity, price) VALUES (1, 'Craft Beer 1', 2, 10.99);
INSERT INTO OrderDetails (order_id, product_name, quantity, price) VALUES (1, 'Craft Beer 2', 1, 8.99);
INSERT INTO OrderDetails (order_id, product_name, quantity, price) VALUES (2, 'Craft Beer 3', 3, 12.99);
INSERT INTO OrderDetails (order_id, product_name, quantity, price) VALUES (3, 'Craft Beer 1', 1, 10.99);
INSERT INTO OrderDetails (order_id, product_name, quantity, price) VALUES (4, 'Craft Beer 2', 2, 8.99);
INSERT INTO OrderDetails (order_id, product_name, quantity, price) VALUES (5, 'Craft Beer 3', 1, 12.99);
