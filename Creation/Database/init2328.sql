CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(50) NOT NULL,
    eventDate DATE NOT NULL,
    createdBy INT(6) UNSIGNED,
    FOREIGN KEY (createdBy) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('user1', 'password1', 'user1@example.com');
INSERT INTO users (username, password, email) VALUES ('user2', 'password2', 'user2@example.com');
INSERT INTO users (username, password, email) VALUES ('user3', 'password3', 'user3@example.com');
INSERT INTO users (username, password, email) VALUES ('user4', 'password4', 'user4@example.com');
INSERT INTO users (username, password, email) VALUES ('user5', 'password5', 'user5@example.com');
INSERT INTO users (username, password, email) VALUES ('user6', 'password6', 'user6@example.com');
INSERT INTO users (username, password, email) VALUES ('user7', 'password7', 'user7@example.com');
INSERT INTO users (username, password, email) VALUES ('user8', 'password8', 'user8@example.com');
INSERT INTO users (username, password, email) VALUES ('user9', 'password9', 'user9@example.com');
INSERT INTO users (username, password, email) VALUES ('user10', 'password10', 'user10@example.com');