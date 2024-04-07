CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
price DECIMAL(10,2) NOT NULL,
category VARCHAR(50) NOT NULL,
image VARCHAR(100),
reg_date TIMESTAMP
);

INSERT INTO products (name, description, price, category, image)
VALUES ('iPhone 13', 'Latest iPhone model', 999.99, 'Electronics', 'iphone13.jpg'),
('Samsung Galaxy S21', 'Flagship Samsung phone', 899.99, 'Electronics', 'samsungs21.jpg'),
('Nike Air Max', 'Popular athletic shoes', 129.99, 'Footwear', 'nikeairmax.jpg'),
('Adidas Ultraboost', 'Running shoes with boost technology', 159.99, 'Footwear', 'adidasultraboost.jpg'),
('Canon EOS R5', 'High-end mirrorless camera', 3499.99, 'Electronics', 'canoneosr5.jpg'),
('Sony WH-1000XM4', 'Premium noise-cancelling headphones', 349.99, 'Electronics', 'sonywh1000xm4.jpg'),
('Levi\'s 501 Jeans', 'Classic denim jeans', 59.99, 'Clothing', 'levis501jeans.jpg'),
('Lululemon Align Leggings', 'Yoga and workout leggings', 99.99, 'Clothing', 'lululemonalignleggings.jpg'),
('Apple Watch Series 7', 'Smartwatch with health features', 399.99, 'Electronics', 'applewatchseries7.jpg'),
('Google Pixel 6', 'Google\'s latest smartphone', 799.99, 'Electronics', 'googlepixel6.jpg');
