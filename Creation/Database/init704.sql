CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO users (name) VALUES ('Alice'), ('Bob'), ('Charlie'), ('David'), ('Eve'), ('Frank'), ('Grace'), ('Henry'), ('Ivy'), ('Jack');

INSERT INTO products (name) VALUES ('Skateboard A'), ('Skateboard B'), ('Skateboard C'), ('Skateboard D'), ('Skateboard E');
