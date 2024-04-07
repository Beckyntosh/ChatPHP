CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
language VARCHAR(10) DEFAULT 'en',
reg_date TIMESTAMP
);

INSERT INTO Users (username, email, language) VALUES ('JohnDoe', 'johndoe@example.com', 'en');
INSERT INTO Users (username, email, language) VALUES ('JaneSmith', 'janesmith@example.com', 'fr');
INSERT INTO Users (username, email, language) VALUES ('AliceJones', 'alicejones@example.com', 'de');
INSERT INTO Users (username, email, language) VALUES ('BobBrown', 'bobbrown@example.com', 'es');
INSERT INTO Users (username, email, language) VALUES ('SarahLee', 'sarahlee@example.com', 'en');
INSERT INTO Users (username, email, language) VALUES ('MikeJohnson', 'mikejohnson@example.com', 'fr');
INSERT INTO Users (username, email, language) VALUES ('EmilyDavis', 'emilydavis@example.com', 'de');
INSERT INTO Users (username, email, language) VALUES ('ChrisWhite', 'chriswhite@example.com', 'es');
INSERT INTO Users (username, email, language) VALUES ('KellyMoore', 'kellymoore@example.com', 'en');
INSERT INTO Users (username, email, language) VALUES ('PeterTaylor', 'petertaylor@example.com', 'fr');
