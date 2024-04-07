-- Initialization script for Makeup Webshop Database
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

-- Create Products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255)
);

-- Create Reviews table
CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  rating INT NOT NULL,
  comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insert sample products
INSERT INTO products (name, description, image) VALUES
('Lipstick', 'A vibrant red lipstick for all occasions.', 'images/lipstick.jpg'),
('Mascara', 'Waterproof mascara for voluminous lashes.', 'images/mascara.jpg'),
('Foundation', 'Liquid foundation for a flawless finish.', 'images/foundation.jpg'),
('Eyeliner', 'Precision eyeliner for the perfect wing.', 'images/eyeliner.jpg'),
('Blush', 'Pink blush for a natural rosy glow.', 'images/blush.jpg'),
('Eyeshadow Palette', 'Palette with 10 vibrant colors.', 'images/eyeshadow_palette.jpg'),
('Lip Balm', 'Moisturizing lip balm for soft lips.', 'images/lip_balm.jpg'),
('Makeup Brushes', 'Set of 5 makeup brushes for various applications.', 'images/makeup_brushes.jpg'),
('Concealer', 'Concealer for covering imperfections.', 'images/concealer.jpg'),
('Nail Polish', 'Long-lasting nail polish in bold colors.', 'images/nail_polish.jpg');

-- Insert sample reviews
INSERT INTO reviews (product_id, rating, comment) VALUES
(1, 5, 'Absolutely love this lipstick! The color is perfect.'),
(1, 4, 'Lasts all day, but a bit drying.'),
(2, 5, 'Truly waterproof and adds so much volume.'),
(3, 3, 'Good coverage but the shade is a bit off for me.'),
(4, 5, 'This eyeliner is a game changer for me.'),
(5, 4, 'Gives a natural look, very pigmented.'),
(6, 5, 'The colors are so versatile and blend well.'),
(7, 3, 'Moisturizing but wears off quickly.'),
(8, 5, 'Great quality brushes at a good price.'),
(9, 4, 'Covers well but creases after long wear.');
