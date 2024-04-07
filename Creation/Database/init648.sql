CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO products (name) VALUES ('Product A');
INSERT INTO products (name) VALUES ('Product B');
INSERT INTO products (name) VALUES ('Product C');
INSERT INTO products (name) VALUES ('Product D');
INSERT INTO products (name) VALUES ('Product E');

INSERT INTO users (name) VALUES ('User 1');
INSERT INTO users (name) VALUES ('User 2');
INSERT INTO users (name) VALUES ('User 3');
INSERT INTO users (name) VALUES ('User 4');
INSERT INTO users (name) VALUES ('User 5');
