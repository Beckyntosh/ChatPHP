CREATE TABLE IF NOT EXISTS carts (
    cart_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    cart_data TEXT NOT NULL,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
    product_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (name, price) VALUES ('Medication A', 10.50);
INSERT INTO products (name, price) VALUES ('Medication B', 20.75);
INSERT INTO products (name, price) VALUES ('Medication C', 15.00);
INSERT INTO products (name, price) VALUES ('Medication D', 12.25);
INSERT INTO products (name, price) VALUES ('Medication E', 8.99);
INSERT INTO products (name, price) VALUES ('Medication F', 18.50);
INSERT INTO products (name, price) VALUES ('Medication G', 22.00);
INSERT INTO products (name, price) VALUES ('Medication H', 14.75);
INSERT INTO products (name, price) VALUES ('Medication I', 11.00);
INSERT INTO products (name, price) VALUES ('Medication J', 16.50);