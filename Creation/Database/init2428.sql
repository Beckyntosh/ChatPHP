CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
news_type VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES Users(id)
);

INSERT INTO Users (username, password, email) VALUES ('john_doe', 'hashed_password_1', 'john.doe@example.com');
INSERT INTO Users (username, password, email) VALUES ('jane_smith', 'hashed_password_2', 'jane.smith@example.com');
INSERT INTO Users (username, password, email) VALUES ('bob_jackson', 'hashed_password_3', 'bob.jackson@example.com');
INSERT INTO Users (username, password, email) VALUES ('alice_cooper', 'hashed_password_4', 'alice.cooper@example.com');
INSERT INTO Users (username, password, email) VALUES ('sam_watson', 'hashed_password_5', 'sam.watson@example.com');
INSERT INTO Users (username, password, email) VALUES ('lisa_brown', 'hashed_password_6', 'lisa.brown@example.com');
INSERT INTO Users (username, password, email) VALUES ('michael_taylor', 'hashed_password_7', 'michael.taylor@example.com');
INSERT INTO Users (username, password, email) VALUES ('susan_adams', 'hashed_password_8', 'susan.adams@example.com');
INSERT INTO Users (username, password, email) VALUES ('peter_garcia', 'hashed_password_9', 'peter.garcia@example.com');
INSERT INTO Users (username, password, email) VALUES ('natalie_rodriguez', 'hashed_password_10', 'natalie.rodriguez@example.com');

INSERT INTO Preferences (user_id, news_type) VALUES (1, 'Wine News');
INSERT INTO Preferences (user_id, news_type) VALUES (1, 'Vineyard Updates');
INSERT INTO Preferences (user_id, news_type) VALUES (2, 'Wine News');
INSERT INTO Preferences (user_id, news_type) VALUES (3, 'Vineyard Updates');
INSERT INTO Preferences (user_id, news_type) VALUES (4, 'Wine News');
INSERT INTO Preferences (user_id, news_type) VALUES (5, 'Vineyard Updates');
INSERT INTO Preferences (user_id, news_type) VALUES (6, 'Wine News');
INSERT INTO Preferences (user_id, news_type) VALUES (7, 'Vineyard Updates');
INSERT INTO Preferences (user_id, news_type) VALUES (8, 'Wine News');
INSERT INTO Preferences (user_id, news_type) VALUES (9, 'Vineyard Updates');
INSERT INTO Preferences (user_id, news_type) VALUES (10, 'Wine News');
