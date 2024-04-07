CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    image VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, image) VALUES ('Shampoo', 'Gentle cleansing for all hair types', 'https://example.com/shampoo.jpg');
INSERT INTO products (name, description, image) VALUES ('Conditioner', 'Moisturizes and detangles hair', 'https://example.com/conditioner.jpg');
INSERT INTO products (name, description, image) VALUES ('Hair Mask', 'Deep conditioning treatment for damaged hair', 'https://example.com/hairmask.jpg');
INSERT INTO products (name, description, image) VALUES ('Hair Oil', 'Nourishing hair oil for shine and hydration', 'https://example.com/hairoil.jpg');
INSERT INTO products (name, description, image) VALUES ('Hair Serum', 'Controls frizz and adds shine', 'https://example.com/hairserum.jpg');
INSERT INTO products (name, description, image) VALUES ('Leave-In Conditioner', 'Leave-in treatment for soft and manageable hair', 'https://example.com/leavein.jpg');
INSERT INTO products (name, description, image) VALUES ('Hair Gel', 'Provides strong hold for styling', 'https://example.com/hairgel.jpg');
INSERT INTO products (name, description, image) VALUES ('Hair Spray', 'Keeps styles in place all day', 'https://example.com/hairspray.jpg');
INSERT INTO products (name, description, image) VALUES ('Dry Shampoo', 'Refreshes hair between washes', 'https://example.com/dryshampoo.jpg');
INSERT INTO products (name, description, image) VALUES ('Hair Mousse', 'Adds volume and texture to hair', 'https://example.com/hairmousse.jpg');
