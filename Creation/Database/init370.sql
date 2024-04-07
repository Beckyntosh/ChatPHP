CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS UserPreferences (
user_id INT(6) UNSIGNED,
favorite_genre VARCHAR(50),
newsletter_subscribed BOOLEAN,
FOREIGN KEY (user_id) REFERENCES Users(id)
);

INSERT INTO Users (username, email) VALUES ('Alice', 'alice@example.com');
INSERT INTO Users (username, email) VALUES ('Bob', 'bob@example.com');
INSERT INTO Users (username, email) VALUES ('Charlie', 'charlie@example.com');
INSERT INTO Users (username, email) VALUES ('David', 'david@example.com');
INSERT INTO Users (username, email) VALUES ('Eve', 'eve@example.com');


INSERT INTO UserPreferences (user_id, favorite_genre, newsletter_subscribed) VALUES (1, 'Action', 1);
INSERT INTO UserPreferences (user_id, favorite_genre, newsletter_subscribed) VALUES (2, 'Comedy', 0);
INSERT INTO UserPreferences (user_id, favorite_genre, newsletter_subscribed) VALUES (3, 'Drama', 1);
INSERT INTO UserPreferences (user_id, favorite_genre, newsletter_subscribed) VALUES (4, 'Sci-Fi', 0);
INSERT INTO UserPreferences (user_id, favorite_genre, newsletter_subscribed) VALUES (5, 'Thriller', 1);