CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
news_category VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO preferences (user_id, news_category) VALUES (1, 'Health');
INSERT INTO preferences (user_id, news_category) VALUES (1, 'Science');

INSERT INTO users (username, password) VALUES ('jane_smith', 'secretword');
INSERT INTO preferences (user_id, news_category) VALUES (2, 'Vitamins');
INSERT INTO preferences (user_id, news_category) VALUES (2, 'Diet');

INSERT INTO users (username, password) VALUES ('bob_jones', 'pass1234');
INSERT INTO preferences (user_id, news_category) VALUES (3, 'Exercise');
INSERT INTO preferences (user_id, news_category) VALUES (3, 'Health');

INSERT INTO users (username, password) VALUES ('alice_wang', 'qwerty');
INSERT INTO preferences (user_id, news_category) VALUES (4, 'Science');
INSERT INTO preferences (user_id, news_category) VALUES (4, 'Health');

INSERT INTO users (username, password) VALUES ('mike_garcia', 'letmein');
INSERT INTO preferences (user_id, news_category) VALUES (5, 'Exercise');
INSERT INTO preferences (user_id, news_category) VALUES (5, 'Diet');

INSERT INTO users (username, password) VALUES ('sara_miller', 'abc123');
INSERT INTO preferences (user_id, news_category) VALUES (6, 'Vitamins');
INSERT INTO preferences (user_id, news_category) VALUES (6, 'Science');

INSERT INTO users (username, password) VALUES ('tom_davis', 'password');
INSERT INTO preferences (user_id, news_category) VALUES (7, 'Health');
INSERT INTO preferences (user_id, news_category) VALUES (7, 'Exercise');

INSERT INTO users (username, password) VALUES ('emily_white', 'password456');
INSERT INTO preferences (user_id, news_category) VALUES (8, 'Diet');
INSERT INTO preferences (user_id, news_category) VALUES (8, 'Science');

INSERT INTO users (username, password) VALUES ('chris_brown', 'secretpass');
INSERT INTO preferences (user_id, news_category) VALUES (9, 'Vitamins');
INSERT INTO preferences (user_id, news_category) VALUES (9, 'Health');

INSERT INTO users (username, password) VALUES ('lisa_kim', 'passpass');
INSERT INTO preferences (user_id, news_category) VALUES (10, 'Exercise');
INSERT INTO preferences (user_id, news_category) VALUES (10, 'Diet');