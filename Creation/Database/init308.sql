CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profile_picture VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS audit_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
action_type VARCHAR(50),
action_details VARCHAR(255),
action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, profile_picture) VALUES ('JohnDoe', 'profile1.jpg');
INSERT INTO users (username, profile_picture) VALUES ('JaneSmith', 'profile2.jpg');
INSERT INTO users (username, profile_picture) VALUES ('AliceWonder', 'profile3.jpg');
INSERT INTO users (username, profile_picture) VALUES ('BobRoss', 'profile4.jpg');
INSERT INTO users (username, profile_picture) VALUES ('EveJohnson', 'profile5.jpg');
INSERT INTO users (username, profile_picture) VALUES ('MaxPower', 'profile6.jpg');
INSERT INTO users (username, profile_picture) VALUES ('LilyRose', 'profile7.jpg');
INSERT INTO users (username, profile_picture) VALUES ('SamWise', 'profile8.jpg');
INSERT INTO users (username, profile_picture) VALUES ('GraceTaylor', 'profile9.jpg');
INSERT INTO users (username, profile_picture) VALUES ('TomHanks', 'profile10.jpg');
