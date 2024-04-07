CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO orders (product_name, custom_size) VALUES ('Wooden Dining Table', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Magazines', 'Regular');
INSERT INTO orders (product_name, custom_size) VALUES ('Cryptic Book', 'Medium');
INSERT INTO orders (product_name, custom_size) VALUES ('Office Chair', 'Small');
INSERT INTO orders (product_name, custom_size) VALUES ('Camping Tent', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Kitchen Utensils', 'Regular');
INSERT INTO orders (product_name, custom_size) VALUES ('Glassware Set', 'Small');
INSERT INTO orders (product_name, custom_size) VALUES ('Gardening Tools', 'Medium');
INSERT INTO orders (product_name, custom_size) VALUES ('Outdoor Grill', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Coffee Maker', 'Regular');
