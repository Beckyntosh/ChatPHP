CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (email, password) VALUES ('user1@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('user2@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('user3@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('user4@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('user5@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('user6@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('user7@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('user8@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('user9@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('user10@example.com', 'password10');
