CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (name, email) VALUES ('Alice', 'alice@example.com');
INSERT INTO users (name, email) VALUES ('Bob', 'bob@example.com');
INSERT INTO users (name, email) VALUES ('Charlie', 'charlie@example.com');
INSERT INTO users (name, email) VALUES ('David', 'david@example.com');
INSERT INTO users (name, email) VALUES ('Emma', 'emma@example.com');
INSERT INTO users (name, email) VALUES ('Frank', 'frank@example.com');
INSERT INTO users (name, email) VALUES ('Grace', 'grace@example.com');
INSERT INTO users (name, email) VALUES ('Henry', 'henry@example.com');
INSERT INTO users (name, email) VALUES ('Ivy', 'ivy@example.com');
INSERT INTO users (name, email) VALUES ('Jack', 'jack@example.com');
