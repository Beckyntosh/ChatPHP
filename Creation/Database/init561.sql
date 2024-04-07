CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, name, email, password) VALUES ('user1', 'User One', 'user1@example.com', 'password1');
INSERT INTO users (username, name, email, password) VALUES ('user2', 'User Two', 'user2@example.com', 'password2');
INSERT INTO users (username, name, email, password) VALUES ('user3', 'User Three', 'user3@example.com', 'password3');
INSERT INTO users (username, name, email, password) VALUES ('user4', 'User Four', 'user4@example.com', 'password4');
INSERT INTO users (username, name, email, password) VALUES ('user5', 'User Five', 'user5@example.com', 'password5');
INSERT INTO users (username, name, email, password) VALUES ('user6', 'User Six', 'user6@example.com', 'password6');
INSERT INTO users (username, name, email, password) VALUES ('user7', 'User Seven', 'user7@example.com', 'password7');
INSERT INTO users (username, name, email, password) VALUES ('user8', 'User Eight', 'user8@example.com', 'password8');
INSERT INTO users (username, name, email, password) VALUES ('user9', 'User Nine', 'user9@example.com', 'password9');
INSERT INTO users (username, name, email, password) VALUES ('user10', 'User Ten', 'user10@example.com', 'password10');
