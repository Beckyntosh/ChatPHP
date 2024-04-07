CREATE TABLE orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(30) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    quantity INT(5) NOT NULL,
    status VARCHAR(20) NOT NULL,
    total_price DECIMAL(10,2) NOT NULL
);

INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('John Doe', 'Laptop', 2, 'Pending', 2000.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Jane Smith', 'Phone', 1, 'Completed', 800.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Alice Johnson', 'Tablet', 3, 'Shipped', 1200.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Bob Brown', 'Headphones', 1, 'Pending', 100.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Eve Wilson', 'Camera', 1, 'Completed', 500.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Charlie Davis', 'Keyboard', 2, 'Shipped', 150.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Grace Moore', 'Smartwatch', 1, 'Pending', 300.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Sam Green', 'Monitor', 1, 'Completed', 600.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Lily Parker', 'Printer', 1, 'Shipped', 400.00);
INSERT INTO orders (customer_name, product_name, quantity, status, total_price) VALUES ('Ryan Lee', 'Speaker', 2, 'Pending', 120.00);
