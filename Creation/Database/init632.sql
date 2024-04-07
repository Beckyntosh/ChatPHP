CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (email, password) VALUES ('john@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('jane@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('alice@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('bob@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('carol@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('dave@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('emily@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('frank@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('grace@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('harry@example.com', 'password10');