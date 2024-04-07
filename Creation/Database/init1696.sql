CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_name VARCHAR(50) NOT NULL,
    quantity INT(3) NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    order_status VARCHAR(20) NOT NULL,
    order_date TIMESTAMP
);

INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard A', 2, 100.00, 'Delivered', '2022-01-15');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard B', 1, 50.00, 'Pending', '2022-02-05');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard C', 3, 150.00, 'Shipped', '2022-03-12');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard D', 1, 75.00, 'Delivered', '2022-04-20');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard E', 2, 100.00, 'Pending', '2022-05-01');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard F', 1, 50.00, 'Shipped', '2022-06-08');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard G', 3, 150.00, 'Delivered', '2022-07-17');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard H', 1, 75.00, 'Pending', '2022-08-22');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard I', 2, 100.00, 'Shipped', '2022-09-30');
INSERT INTO orders (user_id, product_name, quantity, total_price, order_status, order_date) VALUES (1, 'Skateboard J', 1, 50.00, 'Delivered', '2022-10-10');
