CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description TEXT,
category VARCHAR(50),
price DECIMAL(10, 2)
);

INSERT INTO products (name, description, category, price) VALUES 
('Shampoo', 'Cleans and nourishes the hair', 'Hair Care', 10.99),
('Conditioner', 'Adds shine and moisture to the hair', 'Hair Care', 8.99),
('Hair Oil', 'Nourishes and strengthens hair follicles', 'Hair Care', 12.99),
('Hair Mask', 'Deep conditioning treatment for hair', 'Hair Care', 15.99),
('Hair Gel', 'Provides styling and hold to hair', 'Hair Care', 6.99),
('Hair Serum', 'Smoothens and softens hair', 'Hair Care', 14.99),
('Hair Spray', 'Keeps hairstyle in place', 'Hair Care', 7.99),
('Hair Cream', 'Adds volume and texture to hair', 'Hair Care', 9.99),
('Hair Wax', 'Defines and shapes hair', 'Hair Care', 11.99),
('Hair Dye', 'Coloring product for changing hair color', 'Hair Care', 19.99);