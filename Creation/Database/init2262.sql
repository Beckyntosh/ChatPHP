CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
favorite_genre VARCHAR(50),
notifications_enabled BOOLEAN,
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (1, 'Action', 1);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (2, 'Comedy', 0);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (3, 'Drama', 1);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (4, 'Horror', 1);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (5, 'Action', 0);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (6, 'Comedy', 1);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (7, 'Horror', 0);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (8, 'Drama', 1);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (9, 'Action', 1);
INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled) VALUES (10, 'Comedy', 0);
