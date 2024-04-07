CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED,
    eventName VARCHAR(100) NOT NULL,
    eventDate DATE NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('Alice', 'password1', 'alice@example.com');
INSERT INTO users (username, password, email) VALUES ('Bob', 'password2', 'bob@example.com');
INSERT INTO users (username, password, email) VALUES ('Charlie', 'password3', 'charlie@example.com');
INSERT INTO users (username, password, email) VALUES ('David', 'password4', 'david@example.com');
INSERT INTO users (username, password, email) VALUES ('Eve', 'password5', 'eve@example.com');
INSERT INTO users (username, password, email) VALUES ('Frank', 'password6', 'frank@example.com');
INSERT INTO users (username, password, email) VALUES ('Grace', 'password7', 'grace@example.com');
INSERT INTO users (username, password, email) VALUES ('Henry', 'password8', 'henry@example.com');
INSERT INTO users (username, password, email) VALUES ('Ivy', 'password9', 'ivy@example.com');
INSERT INTO users (username, password, email) VALUES ('Jack', 'password10', 'jack@example.com');