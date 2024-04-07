CREATE TABLE products_comparison (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products_comparison (product_name, description, category) VALUES ('iPhone 13', 'Top-of-the-line smartphone from Apple', 'Technology');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Samsung Galaxy S21', 'High-performance smartphone from Samsung', 'Technology');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Fitbit Charge 4', 'Fitness tracker with advanced features', 'Fitness Equipment');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Peloton Bike+', 'Premium indoor exercise bike with live classes', 'Fitness Equipment');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Dumbbell Set', 'Adjustable dumbbells for strength training', 'Fitness Equipment');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Yoga Mat', 'High-quality mat for yoga practice', 'Fitness Equipment');
INSERT INTO products_comparison (product_name, description, category) VALUES ('KitchenAid Stand Mixer', 'Versatile kitchen appliance for baking and cooking', 'Home Appliances');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Roomba Vacuum', 'Smart robotic vacuum cleaner for automated cleaning', 'Home Appliances');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Smart Thermostat', 'Intelligent temperature control system for energy savings', 'Home Appliances');
INSERT INTO products_comparison (product_name, description, category) VALUES ('Instant Pot', 'Multi-functional electric pressure cooker', 'Home Appliances');