CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT(11) NOT NULL
);

INSERT INTO products (name, description, price, stock_quantity) VALUES 
('Pot', 'Large stainless steel cooking pot', 29.99, 50),
('Frying Pan', 'Non-stick frying pan with handle', 19.99, 100),
('Cutting Board', 'Wooden cutting board for vegetables', 12.50, 75),
('Knife Set', 'Set of 5 high-quality chef knives', 49.99, 30),
('Blender', 'Powerful blender for smoothies and soups', 39.99, 40),
('Mixer', 'Electric hand mixer for baking', 24.99, 20),
('Toaster', '4-slice toaster with multiple settings', 34.99, 60),
('Coffee Maker', 'Automatic coffee maker with timer', 49.99, 25),
('Slow Cooker', 'Large slow cooker for stews and roasts', 59.99, 15),
('Teapot', 'Decorative porcelain teapot with matching cups', 19.99, 10);
