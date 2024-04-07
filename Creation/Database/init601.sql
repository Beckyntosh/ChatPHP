CREATE TABLE products (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    Description TEXT
);

INSERT INTO products (Title, Price, Description) VALUES ('Lipstick', 12.99, 'Long-lasting matte lipstick');
INSERT INTO products (Title, Price, Description) VALUES ('Eyeshadow Palette', 24.99, 'Highly pigmented eyeshadow palette');
INSERT INTO products (Title, Price, Description) VALUES ('Foundation', 15.50, 'Medium coverage foundation for all skin types');
INSERT INTO products (Title, Price, Description) VALUES ('Mascara', 8.75, 'Volumizing mascara for dramatic lashes');
INSERT INTO products (Title, Price, Description) VALUES ('Blush', 9.99, 'Pigmented blush for a natural flush of color');
INSERT INTO products (Title, Price, Description) VALUES ('Highlighter', 11.25, 'Glowy highlighter for a radiant look');
INSERT INTO products (Title, Price, Description) VALUES ('Eyeliner', 7.50, 'Waterproof eyeliner for precise application');
INSERT INTO products (Title, Price, Description) VALUES ('Setting Spray', 13.50, 'Long-lasting setting spray for makeup durability');
INSERT INTO products (Title, Price, Description) VALUES ('Concealer', 10.00, 'Full-coverage concealer for hiding imperfections');
INSERT INTO products (Title, Price, Description) VALUES ('Bronzer', 14.25, 'Warm-toned bronzer for a sun-kissed glow');
