CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10,2)
);

INSERT INTO users VALUES (1);
INSERT INTO products (name, description, category, price) VALUES ('Guitar', 'Acoustic guitar with a rosewood finish', 'Music', 500.00);
INSERT INTO products (name, description, category, price) VALUES ('Piano', 'Grand piano with 88 keys', 'Music', 2000.00);
INSERT INTO products (name, description, category, price) VALUES ('Drums', 'Full drum kit with cymbals', 'Music', 1000.00);
INSERT INTO products (name, description, category, price) VALUES ('Violin', 'Professional violin with bow', 'Music', 800.00);
INSERT INTO products (name, description, category, price) VALUES ('Flute', 'Silver flute with carrying case', 'Music', 300.00);
INSERT INTO products (name, description, category, price) VALUES ('Saxophone', 'Alto saxophone in brass', 'Music', 700.00);
INSERT INTO products (name, description, category, price) VALUES ('Trumpet', 'Beginner trumpet with case', 'Music', 400.00);
INSERT INTO products (name, description, category, price) VALUES ('Bass Guitar', 'Electric bass with 4 strings', 'Music', 600.00);
INSERT INTO products (name, description, category, price) VALUES ('Keyboard', 'Portable keyboard with speakers', 'Music', 350.00);
INSERT INTO products (name, description, category, price) VALUES ('Harmonica', 'Classic harmonica in key of C', 'Music', 50.00);
