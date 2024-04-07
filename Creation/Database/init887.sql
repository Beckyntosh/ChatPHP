CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2),
    file_name VARCHAR(255)
);

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    rating INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (name, email) VALUES ('Alice', 'alice@example.com');
INSERT INTO users (name, email) VALUES ('Bob', 'bob@example.com');
INSERT INTO users (name, email) VALUES ('Charlie', 'charlie@example.com');
INSERT INTO users (name, email) VALUES ('David', 'david@example.com');
INSERT INTO users (name, email) VALUES ('Emily', 'emily@example.com');

INSERT INTO products (name, price) VALUES ('Lipstick', 10.50);
INSERT INTO products (name, price) VALUES ('Mascara', 8.75);
INSERT INTO products (name, price) VALUES ('Foundation', 15.25);
INSERT INTO products (name, price) VALUES ('Eyeshadow', 12.99);
INSERT INTO products (name, price) VALUES ('Blush', 7.30);
