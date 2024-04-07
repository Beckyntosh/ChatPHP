CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(50) NOT NULL,
productType VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP
);

INSERT INTO products (productName, productType, description) VALUES ('iPhone 13', 'Smartphone', 'Latest model from Apple');
INSERT INTO products (productName, productType, description) VALUES ('Samsung Galaxy S21', 'Smartphone', 'Flagship phone from Samsung');
INSERT INTO products (productName, productType, description) VALUES ('Instant Pot', 'Cooking Appliance', 'Electric pressure cooker');
INSERT INTO products (productName, productType, description) VALUES ('KitchenAid Stand Mixer', 'Cooking Appliance', 'Popular kitchen mixer');
INSERT INTO products (productName, productType, description) VALUES ('Cuisinart Toaster Oven', 'Kitchen Appliance', 'Versatile toaster oven');
INSERT INTO products (productName, productType, description) VALUES ('Nespresso Coffee Machine', 'Coffee Machine', 'Espresso and coffee maker');
INSERT INTO products (productName, productType, description) VALUES ('Dyson Vacuum Cleaner', 'Home Appliance', 'High-powered vacuum');
INSERT INTO products (productName, productType, description) VALUES ('Fitbit Versa 3', 'Fitness Tracker', 'Health and activity monitor');
INSERT INTO products (productName, productType, description) VALUES ('Sony PlayStation 5', 'Gaming Console', 'Next-gen gaming system');
INSERT INTO products (productName, productType, description) VALUES ('Sony Bravia 4K TV', 'Television', 'High-quality 4K display');
