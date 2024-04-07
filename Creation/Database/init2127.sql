CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS carts (
    cart_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS cart_items (
    item_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cart_id INT(6) UNSIGNED,
    product_name VARCHAR(255) NOT NULL,
    quantity INT(6),
    price DECIMAL(10, 2),
    FOREIGN KEY (cart_id) REFERENCES carts(cart_id)
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'john.doe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'jane.smith@example.com');

INSERT INTO carts (user_id) VALUES (1);
INSERT INTO carts (user_id) VALUES (2);

INSERT INTO cart_items (cart_id, product_name, quantity, price) VALUES (1, 'Video Game 1', 2, 59.99);
INSERT INTO cart_items (cart_id, product_name, quantity, price) VALUES (1, 'Video Game 2', 1, 39.99);
INSERT INTO cart_items (cart_id, product_name, quantity, price) VALUES (2, 'Video Game 3', 1, 49.99);
