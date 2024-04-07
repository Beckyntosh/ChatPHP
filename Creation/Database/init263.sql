CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO users (name, email) VALUES ('Alice', 'alice@example.com');
INSERT INTO users (name, email) VALUES ('Bob', 'bob@example.com');
INSERT INTO users (name, email) VALUES ('Charlie', 'charlie@example.com');
INSERT INTO users (name, email) VALUES ('David', 'david@example.com');
INSERT INTO users (name, email) VALUES ('Eve', 'eve@example.com');
INSERT INTO users (name, email) VALUES ('Frank', 'frank@example.com');
INSERT INTO users (name, email) VALUES ('Grace', 'grace@example.com');
INSERT INTO users (name, email) VALUES ('Henry', 'henry@example.com');
INSERT INTO users (name, email) VALUES ('Ivy', 'ivy@example.com');
INSERT INTO users (name, email) VALUES ('Jack', 'jack@example.com');

INSERT INTO products (name, price) VALUES ('Product A', 10.99);
INSERT INTO products (name, price) VALUES ('Product B', 20.49);
INSERT INTO products (name, price) VALUES ('Product C', 15.99);
INSERT INTO products (name, price) VALUES ('Product D', 30.00);
INSERT INTO products (name, price) VALUES ('Product E', 25.50);
INSERT INTO products (name, price) VALUES ('Product F', 12.75);
INSERT INTO products (name, price) VALUES ('Product G', 18.25);
INSERT INTO products (name, price) VALUES ('Product H', 22.99);
INSERT INTO products (name, price) VALUES ('Product I', 28.75);
INSERT INTO products (name, price) VALUES ('Product J', 17.25);