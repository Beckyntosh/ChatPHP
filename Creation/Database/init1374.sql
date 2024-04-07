CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
dimensions VARCHAR(30) NOT NULL,
quantity INT(3) NOT NULL,
reg_date TIMESTAMP
);

-- Insert values into orders table
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Wooden Dining Table', '120x60x75cm', 2, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Stroller', '100x50x75cm', 1, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby High Chair', '40x40x80cm', 1, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Blanket', '60x40cm', 3, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Toys Set', 'various', 1, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Bath Tub', '50x30x20cm', 2, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Clothes Set', 'various', 5, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Feeding Bottle', '250ml', 4, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Diapers Pack', 'Size 3', 6, NOW());
INSERT INTO orders (product_name, dimensions, quantity, reg_date) VALUES ('Baby Carrier', 'Adjustable', 1, NOW());
