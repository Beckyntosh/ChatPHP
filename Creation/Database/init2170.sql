CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(5) NOT NULL,
    language_name VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    product_description TEXT NOT NULL
);

INSERT INTO languages (language_code, language_name) VALUES
('en', 'English'),
('es', 'Español');

INSERT INTO products (product_name, product_description) VALUES
('Sunglasses', 'High-quality sunglasses for sun protection'),
('Watches', 'Stylish watches for every occasion'),
('Handbags', 'Trendy handbags for fashion enthusiasts'),
('Shoes', 'Comfortable and stylish shoes for all-day wear'),
('Hats', 'Fashionable hats for sun protection'),
('Jewelry', 'Elegant jewelry pieces for special occasions'),
('Scarves', 'Soft and cozy scarves for cold weather'),
('Belts', 'Versatile belts for adding style to outfits'),
('Gloves', 'Warm and durable gloves for winter season'),
('Socks', 'Colorful and fun socks for everyday wear');
