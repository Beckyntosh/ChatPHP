CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (name) VALUES ('John'), ('Alice'), ('Emily'), ('Michael'), ('Sara');
INSERT INTO products (name) VALUES ('Phone'), ('Laptop'), ('Headphones'), ('Camera'), ('Smartwatch');
INSERT INTO wishlist (user_id, product_id) VALUES (1, 2), (2, 3), (4, 1), (3, 4), (5, 5), (1, 3), (2, 1), (5, 4), (4, 2), (3, 5);
