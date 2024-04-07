CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
custom_size VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (product_name, custom_size) VALUES ('Wooden Dining Table', 'Custom Size 1');
INSERT INTO orders (product_name, custom_size) VALUES ('Sofa Set', 'Custom Size 2');
INSERT INTO orders (product_name, custom_size) VALUES ('Coffee Table', 'Custom Size 3');
INSERT INTO orders (product_name, custom_size) VALUES ('Bookshelf', 'Custom Size 4');
INSERT INTO orders (product_name, custom_size) VALUES ('Bed Frame', 'Custom Size 5');
INSERT INTO orders (product_name, custom_size) VALUES ('Dresser', 'Custom Size 6');
INSERT INTO orders (product_name, custom_size) VALUES ('Wardrobe', 'Custom Size 7');
INSERT INTO orders (product_name, custom_size) VALUES ('Desk', 'Custom Size 8');
INSERT INTO orders (product_name, custom_size) VALUES ('TV Stand', 'Custom Size 9');
INSERT INTO orders (product_name, custom_size) VALUES ('Cabinet', 'Custom Size 10');
