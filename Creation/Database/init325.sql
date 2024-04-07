CREATE TABLE IF NOT EXISTS PrivacySettings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profileVisibility ENUM('public', 'private', 'friends') DEFAULT 'public',
reg_date TIMESTAMP
);

INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User1', 'public');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User2', 'private');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User3', 'friends');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User4', 'public');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User5', 'private');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User6', 'public');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User7', 'friends');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User8', 'private');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User9', 'public');
INSERT INTO PrivacySettings (username, profileVisibility) VALUES ('User10', 'friends');
