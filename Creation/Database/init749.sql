CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (username) VALUES ('Alice'), ('Bob'), ('Charlie');
INSERT INTO products (name, description) VALUES ('Product1', 'Description1'), ('Product2', 'Description2');
INSERT INTO orders (user_id, product_id, quantity, date) VALUES (1, 1, 2, '2022-01-01'),
                                                              (2, 2, 1, '2023-02-02'),
                                                              (1, 2, 3, '2024-03-03'),
                                                              (3, 1, 1, '2025-04-04'),
                                                              (3, 2, 2, '2026-05-05'),
                                                              (2, 1, 3, '2027-06-06');
