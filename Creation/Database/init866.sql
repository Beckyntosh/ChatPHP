CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Maternity Dress', 'Beautiful floral dress for expecting mothers', 'Dresses', 49.99, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Maternity Jeans', 'Comfortable and stylish denim jeans for moms-to-be', 'Pants', 39.99, 30);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Nursing Top', 'Soft and stretchy top for breastfeeding moms', 'Tops', 29.99, 40);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Pregnancy Leggings', 'High-waisted leggings for extra support during pregnancy', 'Bottoms', 19.99, 60);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Maternity Skirt', 'A-line skirt that grows with your bump', 'Skirts', 34.99, 25);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Breastfeeding Pajamas', 'Cozy pajama set with nursing access for nighttime feeds', 'Sleepwear', 44.99, 35);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Maternity Activewear', 'Stay active during pregnancy with these supportive leggings', 'Activewear', 24.99, 45);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Pregnancy Support Belt', 'Provides back and belly support for moms-to-be', 'Accessories', 14.99, 20);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Maternity Swimwear', 'Flattering and comfortable swimsuit for expectant mothers', 'Swimwear', 54.99, 15);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Pregnancy Pillow', 'Supports your belly, hips, and back for a better night\'s sleep', 'Bedroom', 39.99, 10);
