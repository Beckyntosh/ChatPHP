CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO products (name, brand, description, price) VALUES ('Necklace', 'Tiffany & Co.', 'Silver necklace with heart pendant', '150.00');
INSERT INTO products (name, brand, description, price) VALUES ('Earrings', 'Pandora', 'Rose gold hoop earrings', '80.00');
INSERT INTO products (name, brand, description, price) VALUES ('Bracelet', 'Swarovski', 'Crystal beaded bracelet', '120.00');
INSERT INTO products (name, brand, description, price) VALUES ('Ring', 'Cartier', 'Diamond engagement ring', '5000.00');
INSERT INTO products (name, brand, description, price) VALUES ('Watch', 'Rolex', 'Vintage mens watch', '1000.00');
INSERT INTO products (name, brand, description, price) VALUES ('Brooch', 'Chanel', 'Classic camellia brooch', '250.00');
INSERT INTO products (name, brand, description, price) VALUES ('Anklet', 'Alex and Ani', 'Gold anklet with charm', '45.00');
INSERT INTO products (name, brand, description, price) VALUES ('Cufflinks', 'Montblanc', 'Silver cufflinks with logo', '150.00');
INSERT INTO products (name, brand, description, price) VALUES ('Pendant', 'James Avery', 'Stainless steel cross pendant', '60.00');
INSERT INTO products (name, brand, description, price) VALUES ('Bangle', 'Kate Spade', 'Enamel bangle bracelet', '80.00');