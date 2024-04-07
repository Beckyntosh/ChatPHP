CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE favorites (
    user_id INT,
    product_id INT,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(product_id) REFERENCES products(id)
);

INSERT INTO users (name, email, address, phone) VALUES ('John Doe', 'john.doe@example.com', '123 Main St, City', '1234567890');
INSERT INTO users (name, email, address, phone) VALUES ('Jane Smith', 'jane.smith@example.com', '456 Elm St, Town', '9876543210');
INSERT INTO products (name) VALUES ('Product A');
INSERT INTO products (name) VALUES ('Product B');
INSERT INTO products (name) VALUES ('Product C');
INSERT INTO products (name) VALUES ('Product D');
INSERT INTO favorites (user_id, product_id) VALUES (1, 1);
INSERT INTO favorites (user_id, product_id) VALUES (1, 2);
INSERT INTO favorites (user_id, product_id) VALUES (2, 3);
INSERT INTO favorites (user_id, product_id) VALUES (2, 4);
INSERT INTO favorites (user_id, product_id) VALUES (2, 1);
