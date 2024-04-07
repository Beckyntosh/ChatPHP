CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS UserPreferences (
    userId INT(6) UNSIGNED,
    favoriteGenre VARCHAR(50),
    favoriteDecade VARCHAR(50),
    newsletterSubscription BOOLEAN,
    FOREIGN KEY (userId) REFERENCES Users(id)
);

INSERT INTO Users (username, email) VALUES ('JohnDoe', 'johndoe@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (1, 'rock', '1970s', 1);
INSERT INTO Users (username, email) VALUES ('JaneSmith', 'janesmith@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (2, 'pop', '1990s', 0);
INSERT INTO Users (username, email) VALUES ('MikeJohnson', 'mikejohnson@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (3, 'jazz', '1960s', 1);
INSERT INTO Users (username, email) VALUES ('SarahBrown', 'sarahbrown@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (4, 'classical', '2000s', 0);
INSERT INTO Users (username, email) VALUES ('ChrisWilliams', 'chriswilliams@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (5, 'metal', '1980s', 1);
INSERT INTO Users (username, email) VALUES ('EmilyDavis', 'emilydavis@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (6, 'rock', '1970s', 0);
INSERT INTO Users (username, email) VALUES ('AlexWhite', 'alexwhite@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (7, 'pop', '1990s', 1);
INSERT INTO Users (username, email) VALUES ('LisaBrown', 'lisabrown@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (8, 'jazz', '1960s', 0);
INSERT INTO Users (username, email) VALUES ('SamGreen', 'samgreen@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (9, 'classical', '2000s', 1);
INSERT INTO Users (username, email) VALUES ('AvaMartinez', 'avamartinez@example.com');
INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (10, 'metal', '1980s', 0);
