CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, category, price, reg_date) VALUES ('Gibson Les Paul Standard', 'Classic electric guitar with a rich history', 'Electric Guitars', 1999.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Fender Stratocaster', 'Iconic electric guitar known for its versatility', 'Electric Guitars', 1499.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Yamaha YAS-62 Alto Saxophone', 'Professional grade alto saxophone with great sound', 'Saxophones', 1899.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Roland RD-2000 Stage Piano', 'High-quality stage piano with realistic feel', 'Keyboards & Pianos', 2499.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Djembe Drum', 'Handmade djembe drum from Africa', 'Drums & Percussion', 299.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Taylor 814CE Acoustic Guitar', 'Premium acoustic guitar with beautiful tone', 'Acoustic Guitars', 2999.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Korg Minilogue XD Synthesizer', 'Versatile analog synthesizer with digital effects', 'Synthesizers', 799.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Pearl Export Series Drum Set', 'Reliable drum set perfect for beginners', 'Drums & Percussion', 799.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Sennheiser HD 650 Headphones', 'High-fidelity headphones for audio professionals', 'Accessories', 399.99, NOW());
INSERT INTO products (name, description, category, price, reg_date) VALUES ('Kawai MP11SE Stage Piano', 'Top-of-the-line stage piano for professional musicians', 'Keyboards & Pianos', 3299.99, NOW());
