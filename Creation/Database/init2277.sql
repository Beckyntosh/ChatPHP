CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
favorite_genre VARCHAR(30) NOT NULL,
receive_newsletters BOOLEAN,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (1, 'Sci-Fi', 1);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (1, 'History', 0);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (1, 'Technology', 1);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (1, 'Art', 0);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (2, 'Sci-Fi', 1);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (2, 'History', 0);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (2, 'Technology', 1);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (2, 'Art', 0);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (3, 'Sci-Fi', 1);
INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (3, 'History', 0);