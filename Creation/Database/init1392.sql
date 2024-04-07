CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    product_name VARCHAR(255) NOT NULL, 
    custom_size VARCHAR(255) NOT NULL, 
    quantity INT NOT NULL,
    order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Wooden Dining Table', '200x100 cm', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Metal Chairs', 'Standard', 4);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Glass Coffee Table', '120x60 cm', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Leather Sofa', '3-seater', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Wool Rug', '8x10 ft', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Modern Lamp', 'Black', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Kitchen Island', 'Wood', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Bed Frame', 'Queen size', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Outdoor Dining Set', '6-piece', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('Office Desk', 'L-shaped', 1);
