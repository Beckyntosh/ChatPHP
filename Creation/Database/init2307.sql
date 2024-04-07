CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(6) DEFAULT 0,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('user1', 'user1@example.com', 'pass1');
INSERT INTO users (username, email, password) VALUES ('user2', 'user2@example.com', 'pass2');
INSERT INTO users (username, email, password) VALUES ('user3', 'user3@example.com', 'pass3');
INSERT INTO users (username, email, password) VALUES ('user4', 'user4@example.com', 'pass4');
INSERT INTO users (username, email, password) VALUES ('user5', 'user5@example.com', 'pass5');
INSERT INTO users (username, email, password) VALUES ('user6', 'user6@example.com', 'pass6');
INSERT INTO users (username, email, password) VALUES ('user7', 'user7@example.com', 'pass7');
INSERT INTO users (username, email, password) VALUES ('user8', 'user8@example.com', 'pass8');
INSERT INTO users (username, email, password) VALUES ('user9', 'user9@example.com', 'pass9');
INSERT INTO users (username, email, password) VALUES ('user10', 'user10@example.com', 'pass10');

INSERT INTO loyalty_program (user_id, points) VALUES (1, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (2, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (3, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (4, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (5, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (6, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (7, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (8, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (9, 0);
INSERT INTO loyalty_program (user_id, points) VALUES (10, 0);
