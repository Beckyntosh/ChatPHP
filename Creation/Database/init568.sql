CREATE TABLE products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT
);

INSERT INTO products (product_name, price, description) VALUES ('Foundation', 25.00, 'A liquid foundation for a flawless finish');
INSERT INTO products (product_name, price, description) VALUES ('Mascara', 10.50, 'Volumizing mascara for longer lashes');
INSERT INTO products (product_name, price, description) VALUES ('Lipstick', 15.00, 'Matte lipstick in various shades');
INSERT INTO products (product_name, price, description) VALUES ('Eyeshadow Palette', 30.00, 'Palette with multiple colors for different looks');
INSERT INTO products (product_name, price, description) VALUES ('Highlighter', 12.50, 'Shimmery highlighter for a glowing complexion');
INSERT INTO products (product_name, price, description) VALUES ('Blush', 8.00, 'Powder blush to add color to cheeks');
INSERT INTO products (product_name, price, description) VALUES ('Concealer', 18.00, 'Creamy concealer to cover imperfections');
INSERT INTO products (product_name, price, description) VALUES ('Eyeliner', 7.50, 'Liquid eyeliner for precise application');
INSERT INTO products (product_name, price, description) VALUES ('Setting Spray', 20.00, 'Makeup setting spray to keep makeup in place');
INSERT INTO products (product_name, price, description) VALUES ('Bronzer', 14.00, 'Bronzing powder for a sun-kissed look');
