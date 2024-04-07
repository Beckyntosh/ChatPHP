CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
preference TEXT,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password) VALUES ('JohnDoe', 'password123');
INSERT INTO users (username, password) VALUES ('JaneSmith', 'securepwd456');
INSERT INTO users (username, password) VALUES ('AliceJones', 'p@ssw0rd');

INSERT INTO preferences (user_id, preference) VALUES (1, 'Technology, Science');
INSERT INTO preferences (user_id, preference) VALUES (2, 'Fashion, Lifestyle');
INSERT INTO preferences (user_id, preference) VALUES (3, 'Travel, Food');
