CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT NOT NULL
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Maternity Dress', 'Stylish and comfortable maternity dress for expecting mothers', 'Maternity Wear', 49.99, 100),
('Baby Blanket', 'Soft and cozy baby blanket for infants', 'Baby Accessories', 19.99, 50),
('Children\'s Book', 'Educational book for children to learn and have fun', 'Children\'s Education', 12.99, 30),
('Pregnancy Journal', 'Keepsake journal for documenting pregnancy journey', 'Maternity Gifts', 24.99, 20),
('Kids Puzzle Set', 'Fun and colorful puzzle set for kids', 'Children\'s Toys', 9.99, 40),
('Baby Onesie', 'Adorable onesie for newborn babies', 'Baby Clothing', 14.99, 60),
('Maternity Leggings', 'Stretchy and comfortable leggings for pregnant women', 'Maternity Wear', 29.99, 80),
('Interactive Learning Toy', 'Interactive toy for kids to enhance learning skills', 'Children\'s Education', 34.99, 25),
('Newborn Hat', 'Cute hat for newborns to keep them warm', 'Baby Accessories', 8.99, 70),
('Kids Coloring Book', 'Creative coloring book for kids to express their creativity', 'Children\'s Education', 6.99, 45);
