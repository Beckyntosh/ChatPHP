CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT,
event_date DATE,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('user1', 'user1@example.com', 'password1');
INSERT INTO users (username, email, password) VALUES ('user2', 'user2@example.com', 'password2');
INSERT INTO users (username, email, password) VALUES ('user3', 'user3@example.com', 'password3');
INSERT INTO users (username, email, password) VALUES ('user4', 'user4@example.com', 'password4');
INSERT INTO users (username, email, password) VALUES ('user5', 'user5@example.com', 'password5');
INSERT INTO users (username, email, password) VALUES ('user6', 'user6@example.com', 'password6');
INSERT INTO users (username, email, password) VALUES ('user7', 'user7@example.com', 'password7');
INSERT INTO users (username, email, password) VALUES ('user8', 'user8@example.com', 'password8');
INSERT INTO users (username, email, password) VALUES ('user9', 'user9@example.com', 'password9');
INSERT INTO users (username, email, password) VALUES ('user10', 'user10@example.com', 'password10');