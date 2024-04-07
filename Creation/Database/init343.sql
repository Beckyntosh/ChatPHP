CREATE TABLE IF NOT EXISTS Orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(30) NOT NULL,
  quantity INT(3) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  status VARCHAR(10) NOT NULL
);

INSERT INTO Orders (product_name, quantity, status) VALUES ('Shoes', 2, 'Pending');
INSERT INTO Orders (product_name, quantity, status) VALUES ('T-shirt', 3, 'Delivered');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Jeans', 1, 'Cancelled');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Socks', 5, 'Shipped');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Hat', 2, 'Delivered');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Dress', 1, 'Pending');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Jacket', 1, 'Shipped');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Pants', 4, 'Delivered');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Skirt', 2, 'Pending');
INSERT INTO Orders (product_name, quantity, status) VALUES ('Hoodie', 2, 'Shipped');
