CREATE TABLE IF NOT EXISTS custom_orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_type VARCHAR(50) NOT NULL,
custom_size VARCHAR(50) NOT NULL,
user_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 1', 'user1@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 2', 'user2@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 3', 'user3@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 4', 'user4@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 5', 'user5@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 6', 'user6@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 7', 'user7@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 8', 'user8@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 9', 'user9@gmail.com');
INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('Wooden Dining Table', 'Custom Size 10', 'user10@gmail.com');
