CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    type VARCHAR(50),
    price DECIMAL(10, 2),
    description TEXT,
    reg_date TIMESTAMP
);

INSERT INTO products (name, brand, type, price, description) VALUES ('Lipstick', 'Medieval Magic', 'Makeup', 19.99, 'Luxurious medieval shade of crimson red');
INSERT INTO products (name, brand, type, price, description) VALUES ('Eyeliner', 'Ancient Alchemy', 'Makeup', 15.99, 'Deep black for a mystic look');
INSERT INTO products (name, brand, type, price, description) VALUES ('Foundation', 'Golden Age Cosmetics', 'Makeup', 24.99, 'Weightless formula for a flawless finish');
INSERT INTO products (name, brand, type, price, description) VALUES ('Mascara', 'Renaissance Beauty', 'Makeup', 12.50, 'Lengthening and volumizing for dramatic eyes');
INSERT INTO products (name, brand, type, price, description) VALUES ('Blush', 'Royal Flush', 'Makeup', 18.75, 'Rosy pink hue for a natural flush');
INSERT INTO products (name, brand, type, price, description) VALUES ('Eyeshadow Palette', 'Artisan Shadows', 'Makeup', 29.99, 'Versatile shades for creative eye looks');
INSERT INTO products (name, brand, type, price, description) VALUES ('Highlighter', 'Celestial Glow', 'Makeup', 14.50, 'Glowing shimmer for radiant skin');
INSERT INTO products (name, brand, type, price, description) VALUES ('Powder', 'Courtly Charm', 'Makeup', 8.99, 'Mattifying powder to set makeup');
INSERT INTO products (name, brand, type, price, description) VALUES ('Lip Gloss', 'Enchanted Elixir', 'Makeup', 10.75, 'High-shine gloss for luscious lips');
INSERT INTO products (name, brand, type, price, description) VALUES ('Concealer', 'Secret Veil', 'Makeup', 17.25, 'Lightweight and full coverage concealer');
