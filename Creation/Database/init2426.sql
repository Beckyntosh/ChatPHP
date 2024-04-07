CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

-- Create News Preferences Table
CREATE TABLE IF NOT EXISTS news_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
category VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert Sample Data into Users Table
INSERT INTO users (username, password) VALUES ('john_doe', 'password1');
INSERT INTO users (username, password) VALUES ('jane_smith', 'password2');
INSERT INTO users (username, password) VALUES ('alice_wonderland', 'password3');
INSERT INTO users (username, password) VALUES ('bob_marley', 'password4');
INSERT INTO users (username, password) VALUES ('emma_stone', 'password5');

-- Insert Sample Data into News Preferences Table
INSERT INTO news_preferences (user_id, category) VALUES (1, 'baby_care');
INSERT INTO news_preferences (user_id, category) VALUES (2, 'nutrition');
INSERT INTO news_preferences (user_id, category) VALUES (3, 'toys');
INSERT INTO news_preferences (user_id, category) VALUES (4, 'education');
INSERT INTO news_preferences (user_id, category) VALUES (5, 'baby_care');
