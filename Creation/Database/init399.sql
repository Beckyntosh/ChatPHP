CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
category VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES ('JohnDoe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('JaneSmith', 'letmein', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('MikeJohnson', 'mike123', 'mike.johnson@example.com');
INSERT INTO users (username, password, email) VALUES ('SarahBrown', 'sarahB', 'sarah.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('ChrisLee', 'lee123', 'chris.lee@example.com');
INSERT INTO users (username, password, email) VALUES ('EmilyClark', 'clarkE', 'emily.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('AlexTaylor', 'taylor22', 'alex.taylor@example.com');
INSERT INTO users (username, password, email) VALUES ('LisaWright', 'lisa567', 'lisa.wright@example.com');
INSERT INTO users (username, password, email) VALUES ('PeterEvans', 'peter@123', 'peter.evans@example.com');
INSERT INTO users (username, password, email) VALUES ('OliviaMoore', 'oliviaM', 'olivia.moore@example.com');

INSERT INTO preferences (user_id, category) VALUES (1, 'Tricks');
INSERT INTO preferences (user_id, category) VALUES (1, 'Events');
INSERT INTO preferences (user_id, category) VALUES (2, 'Gear');
INSERT INTO preferences (user_id, category) VALUES (3, 'Events');
INSERT INTO preferences (user_id, category) VALUES (4, 'Tricks');
INSERT INTO preferences (user_id, category) VALUES (5, 'Gear');
INSERT INTO preferences (user_id, category) VALUES (6, 'Tricks');
INSERT INTO preferences (user_id, category) VALUES (7, 'Events');
INSERT INTO preferences (user_id, category) VALUES (8, 'Gear');
INSERT INTO preferences (user_id, category) VALUES (9, 'Tricks');
INSERT INTO preferences (user_id, category) VALUES (10, 'Events');
