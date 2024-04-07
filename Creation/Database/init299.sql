CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password) VALUES ('user1', 'password1');
INSERT INTO users (username, password) VALUES ('user2', 'password2');
INSERT INTO users (username, password) VALUES ('user3', 'password3');
INSERT INTO users (username, password) VALUES ('user4', 'password4');
INSERT INTO users (username, password) VALUES ('user5', 'password5');
INSERT INTO users (username, password) VALUES ('user6', 'password6');
INSERT INTO users (username, password) VALUES ('user7', 'password7');
INSERT INTO users (username, password) VALUES ('user8', 'password8');
INSERT INTO users (username, password) VALUES ('user9', 'password9');
INSERT INTO users (username, password) VALUES ('user10', 'password10');