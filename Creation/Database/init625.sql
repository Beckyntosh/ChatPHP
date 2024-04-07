CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10,2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Vitamin C', 'Boosts immunity', 'Supplements', 10.50, 100);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Vitamin D', 'Supports bone health', 'Supplements', 15.75, 75);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Calcium', 'Essential for strong bones', 'Supplements', 12.25, 50);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Fish Oil', 'Rich in Omega-3 fatty acids', 'Supplements', 20.00, 120);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Iron', 'Helps prevent anemia', 'Supplements', 8.99, 90);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Zinc', 'Immune system support', 'Supplements', 7.50, 80);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Magnesium', 'Supports muscle and nerve function', 'Supplements', 11.30, 60);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Vitamin B12', 'Boosts energy levels', 'Supplements', 9.25, 110);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Probiotics', 'Promotes gut health', 'Supplements', 17.99, 70);
INSERT INTO products (name, description, category, price, stock_quantity) VALUES ('Turmeric', 'Anti-inflammatory properties', 'Supplements', 14.50, 85);
