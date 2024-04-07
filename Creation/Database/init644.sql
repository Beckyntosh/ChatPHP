CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    product_description TEXT,
    product_price DECIMAL(8, 2) NOT NULL
);

-- Insert sample values into products table
INSERT INTO products (product_name, product_description, product_price) VALUES ('Vitamin C', 'Boosts immunity', 10.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Vitamin D', 'Regulates calcium levels', 12.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Multivitamin', 'Complete daily nutrients', 15.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Fish Oil', 'Rich in Omega-3 fatty acids', 9.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Probiotics', 'Maintains gut health', 20.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Magnesium', 'Supports muscle function', 7.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Coenzyme Q10', 'Powerful antioxidant', 18.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Biotin', 'Promotes healthy hair and nails', 11.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Zinc', 'Supports immune system', 6.99);
INSERT INTO products (product_name, product_description, product_price) VALUES ('Iron', 'Essential for red blood cell production', 8.99);
