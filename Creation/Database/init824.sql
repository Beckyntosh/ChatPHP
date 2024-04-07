CREATE TABLE products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(100) NOT NULL,
  image VARCHAR(100) NOT NULL
);

INSERT INTO products (name, description, image) VALUES ('Lipstick', 'Long-lasting matte lipstick', 'images/lipstick.jpg');
INSERT INTO products (name, description, image) VALUES ('Eyeshadow Palette', '20-color eyeshadow palette', 'images/eyeshadow.jpg');
INSERT INTO products (name, description, image) VALUES ('Foundation', 'Liquid foundation for all skin types', 'images/foundation.jpg');
INSERT INTO products (name, description, image) VALUES ('Mascara', 'Volumizing mascara for bold lashes', 'images/mascara.jpg');
INSERT INTO products (name, description, image) VALUES ('Blush', 'Pigmented blush for a natural flush', 'images/blush.jpg');
INSERT INTO products (name, description, image) VALUES ('Highlighter', 'Glowing highlighter for that dewy look', 'images/highlighter.jpg');
INSERT INTO products (name, description, image) VALUES ('Eyeliner', 'Waterproof eyeliner for precise application', 'images/eyeliner.jpg');
INSERT INTO products (name, description, image) VALUES ('Concealer', 'Full-coverage concealer for flawless skin', 'images/concealer.jpg');
INSERT INTO products (name, description, image) VALUES ('Setting Spray', 'Long-lasting setting spray for makeup longevity', 'images/spray.jpg');
INSERT INTO products (name, description, image) VALUES ('Bronzer', 'Sun-kissed bronzer to contour and warm the complexion', 'images/bronzer.jpg');