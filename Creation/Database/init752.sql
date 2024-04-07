CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (name) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eve');
INSERT INTO products (name) VALUES ('Shovel'), ('Rake'), ('Hose'), ('Pruner'), ('Gloves');
INSERT INTO favorites (user_id, product_id) VALUES (1, 2), (3, 4), (2, 3), (1, 5), (4, 1), (5, 4), (3, 2), (2, 5), (1, 3), (4, 5);
