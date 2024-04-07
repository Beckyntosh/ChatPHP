CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    review TEXT
);

INSERT INTO users (username) VALUES ('Alice');
INSERT INTO users (username) VALUES ('Bob');
INSERT INTO users (username) VALUES ('Charlie');
INSERT INTO users (username) VALUES ('David');
INSERT INTO users (username) VALUES ('Eve');

INSERT INTO products (product_name, review) VALUES ('Paint Set', 'Great quality and vibrant colors!');
INSERT INTO products (product_name, review) VALUES ('Sketchbook', 'Perfect size for sketching on the go.');
INSERT INTO products (product_name, review) VALUES ('Paint Brushes', 'Easy to clean and sturdy.');
INSERT INTO products (product_name, review) VALUES ('Canvas', 'Durable and easy to work with.');
INSERT INTO products (product_name, review) VALUES ('Watercolor Palette', 'Beautiful selection of colors.');

