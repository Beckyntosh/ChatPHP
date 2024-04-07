CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10,2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Saucepan', 'A versatile kitchen essential for cooking sauces, soups, and more', 'Cookware', 19.99, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Chef\'s Knife', 'High-quality sharp knife for cutting, chopping, and slicing ingredients', 'Cutlery', 29.99, 30);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Mixing Bowl Set', 'Set of different sized mixing bowls for food preparation', 'Bakeware', 15.99, 40);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Blender', 'Powerful blender for making smoothies, soups, and sauces', 'Appliances', 49.99, 20);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Measuring Cups', 'Set of measuring cups for precise ingredient measurements', 'Utensils', 9.99, 60);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Toaster', 'Compact toaster for toasting bread and bagels', 'Appliances', 24.99, 25);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Frying Pan', 'Non-stick frying pan for cooking eggs, pancakes, and more', 'Cookware', 14.99, 35);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Cutting Board', 'Durable cutting board for chopping and slicing ingredients', 'Utensils', 12.99, 45);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Mixer', 'Handheld mixer for mixing batters, creams, and sauces', 'Appliances', 19.99, 30);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Peeler', 'Vegetable peeler for peeling and slicing vegetables', 'Utensils', 6.99, 55);
