CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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