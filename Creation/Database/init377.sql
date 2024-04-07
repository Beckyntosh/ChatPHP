CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(10),
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email, loyalty_member) VALUES ('john_doe', 'password123', 'john.doe@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('jane_smith', 'smithy321', 'jane.smith@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('bob123', 'ilovecoding', 'bob@gmail.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('alice_wonderland', 'wonder123', 'alice@wonderland.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('sam_green', 'greenbean', 'sam.green@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('emily_roberts', 'emily123', 'emily@roberts.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('alex_jones', 'jonesy', 'alex@jones.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('laura_white', 'white123', 'laura.white@example.com', 0);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('michael_smith', 'mike456', 'michael.smith@example.com', 1);
INSERT INTO users (username, password, email, loyalty_member) VALUES ('sara_davis', 'sara567', 'sara.davis@example.com', 0);

INSERT INTO loyalty_program (user_id, points) VALUES (1, 100);
INSERT INTO loyalty_program (user_id, points) VALUES (3, 50);
INSERT INTO loyalty_program (user_id, points) VALUES (5, 75);
INSERT INTO loyalty_program (user_id, points) VALUES (7, 30);
INSERT INTO loyalty_program (user_id, points) VALUES (9, 80);