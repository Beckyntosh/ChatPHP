CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (cart_id) REFERENCES carts(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, price) VALUES ('Multivitamin', 15.99);
INSERT INTO products (name, price) VALUES ('Vitamin C', 9.99);
INSERT INTO products (name, price) VALUES ('Vitamin D', 12.50);
INSERT INTO products (name, price) VALUES ('Fish Oil', 8.75);
INSERT INTO products (name, price) VALUES ('Probiotics', 19.99);
INSERT INTO products (name, price) VALUES ('Calcium', 7.25);
INSERT INTO products (name, price) VALUES ('Vitamin B12', 10.75);
INSERT INTO products (name, price) VALUES ('Iron', 6.50);
INSERT INTO products (name, price) VALUES ('Magnesium', 11.25);
INSERT INTO products (name, price) VALUES ('Vitamin E', 14.50);
