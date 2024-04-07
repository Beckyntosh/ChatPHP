CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_descr TEXT,
    price DECIMAL(10, 2)
);

INSERT INTO products (product_name, product_descr, price) VALUES ('Spring Blush', 'A beautiful blush for a fresh spring look', 12.99);
INSERT INTO products (product_name, product_descr, price) VALUES ('Dewy Highlighter', 'Gives you that glowy, dewy finish', 15.50);
INSERT INTO products (product_name, product_descr, price) VALUES ('Floral Lipstick', 'A bright pop of color for your lips', 9.75);
INSERT INTO products (product_name, product_descr, price) VALUES ('Pastel Eyeshadow Palette', 'Soft and dreamy colors for your eyes', 25.99);
INSERT INTO products (product_name, product_descr, price) VALUES ('Rose Scented Setting Spray', 'Sets your makeup while giving a subtle floral scent', 8.99);
INSERT INTO products (product_name, product_descr, price) VALUES ('Springtime Nail Polish', 'Fresh spring shades for your nails', 5.99);
INSERT INTO products (product_name, product_descr, price) VALUES ('Cherry Blossom Perfume', 'A light and airy fragrance for the season', 18.50);
INSERT INTO products (product_name, product_descr, price) VALUES ('Tulip Blush Brush', 'A soft and fluffy brush for applying blush', 6.75);
INSERT INTO products (product_name, product_descr, price) VALUES ('Lilac Eyeliner', 'Bright and colorful eyeliner for a playful look', 7.99);
INSERT INTO products (product_name, product_descr, price) VALUES ('Hydrating Spring Lip Balm', 'Moisturizes and adds a hint of color to your lips', 4.50);
