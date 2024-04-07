CREATE TABLE IF NOT EXISTS laptops (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        brand VARCHAR(255),
        model VARCHAR(255),
        price DECIMAL(10, 2),
        specifications TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO laptops (brand, model, price, specifications) VALUES ('Apple', 'MacBook Pro', 1999.99, '16GB RAM, 512GB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('Dell', 'XPS 13', 1399.99, '8GB RAM, 256GB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('HP', 'Spectre x360', 1199.99, '16GB RAM, 1TB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('Lenovo', 'ThinkPad X1 Carbon', 1499.99, '16GB RAM, 512GB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('Asus', 'ZenBook Pro Duo', 2499.99, '32GB RAM, 1TB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('Microsoft', 'Surface Laptop 4', 1299.99, '8GB RAM, 256GB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('Acer', 'Predator Helios 300', 1199.99, '16GB RAM, 512GB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('Razer', 'Blade 15', 1999.99, '16GB RAM, 1TB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('MSI', 'GS66 Stealth', 1799.99, '32GB RAM, 1TB SSD');
INSERT INTO laptops (brand, model, price, specifications) VALUES ('LG', 'Gram 17', 1499.99, '16GB RAM, 512GB SSD');
