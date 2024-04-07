CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
category VARCHAR(30) NOT NULL,
price DECIMAL(10, 2) NOT NULL,
description TEXT,
reg_date TIMESTAMP
);

INSERT INTO products (name, category, price, description) VALUES ('Apple', 'Fruits', 2.50, 'Fresh and delicious apples');
INSERT INTO products (name, category, price, description) VALUES ('Banana', 'Fruits', 1.20, 'Sweet and healthy bananas');
INSERT INTO products (name, category, price, description) VALUES ('Bread', 'Bakery', 3.00, 'Freshly baked bread loaf');
INSERT INTO products (name, category, price, description) VALUES ('Milk', 'Dairy', 1.50, 'Organic milk from local farms');
INSERT INTO products (name, category, price, description) VALUES ('Eggs', 'Dairy', 2.00, 'Free-range organic eggs');
INSERT INTO products (name, category, price, description) VALUES ('Coffee', 'Beverages', 5.50, 'Premium ground coffee beans');
INSERT INTO products (name, category, price, description) VALUES ('Tomato', 'Vegetables', 1.00, 'Juicy and ripe tomatoes');
INSERT INTO products (name, category, price, description) VALUES ('Chocolate', 'Sweets', 4.50, 'Rich and creamy chocolate bar');
INSERT INTO products (name, category, price, description) VALUES ('Cheese', 'Dairy', 3.50, 'Variety of gourmet cheeses');
INSERT INTO products (name, category, price, description) VALUES ('Orange Juice', 'Beverages', 2.75, 'Freshly squeezed orange juice');
