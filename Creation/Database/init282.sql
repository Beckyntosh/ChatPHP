CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    dimensions VARCHAR(255) NOT NULL,
    user_email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Wooden Dining Table', '100x50x75', 'user1@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Custom Mug', '8x8x10', 'user2@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Personalized T-shirt', 'M', 'user3@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Handcrafted Jewelry', '18k gold', 'user4@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Custom-made Shoes', 'Size 9', 'user5@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Custom Leather Bag', 'Black', 'user6@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Customized Phone Case', 'iPhone X', 'user7@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Personalized Stationery Set', 'Paper and Pens', 'user8@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Bespoke Watch', 'Handcrafted', 'user9@example.com');
INSERT INTO custom_orders (product_name, dimensions, user_email) VALUES ('Tailored Suit', 'Blue', 'user10@example.com');
