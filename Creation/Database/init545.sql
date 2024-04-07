CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('Alice', 'alice@example.com', 'password1');
INSERT INTO users (name, email, password) VALUES ('Bob', 'bob@example.com', 'password2');
INSERT INTO users (name, email, password) VALUES ('Charlie', 'charlie@example.com', 'password3');
INSERT INTO users (name, email, password) VALUES ('David', 'david@example.com', 'password4');
INSERT INTO users (name, email, password) VALUES ('Eve', 'eve@example.com', 'password5');
INSERT INTO users (name, email, password) VALUES ('Frank', 'frank@example.com', 'password6');
INSERT INTO users (name, email, password) VALUES ('Grace', 'grace@example.com', 'password7');
INSERT INTO users (name, email, password) VALUES ('Henry', 'henry@example.com', 'password8');
INSERT INTO users (name, email, password) VALUES ('Ivy', 'ivy@example.com', 'password9');
INSERT INTO users (name, email, password) VALUES ('Jack', 'jack@example.com', 'password10');
