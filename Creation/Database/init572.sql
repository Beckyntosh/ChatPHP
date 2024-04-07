CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255),
    productPrice DECIMAL(10,2),
    productDescription TEXT,
    image VARCHAR(255)
);

INSERT INTO products (productName, productPrice, productDescription, image) VALUES
('Foundation', 20.00, 'Liquid foundation for a flawless finish', 'foundation.jpg'),
('Mascara', 10.50, 'Volumizing mascara for bold lashes', 'mascara.jpg'),
('Lipstick', 15.75, 'Matte lipstick in a vibrant red shade', 'lipstick.jpg'),
('Eyeshadow Palette', 25.99, 'Palette with a range of neutral shades', 'eyeshadow.jpg'),
('Blush', 12.25, 'Pigmented blush for a natural flush', 'blush.jpg'),
('Highlighter', 18.50, 'Glowing highlighter for a radiant look', 'highlighter.jpg'),
('Eyeliner', 8.99, 'Liquid eyeliner for precise application', 'eyeliner.jpg'),
('Bronzer', 14.00, 'Bronzing powder for a sun-kissed glow', 'bronzer.jpg'),
('Setting Spray', 22.75, 'Long-lasting setting spray for makeup', 'settingspray.jpg'),
('Concealer', 16.50, 'Full coverage concealer to hide imperfections', 'concealer.jpg');
