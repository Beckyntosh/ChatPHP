CREATE TABLE IF NOT EXISTS profile_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
favorite_color VARCHAR(30) NOT NULL,
size_preference VARCHAR(30) NOT NULL,
style_preference VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (1, 'Blue', 'Medium', 'calm');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (2, 'Green', 'Small', NULL);
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (3, 'Red', 'Large', 'cool');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (4, 'Yellow', 'Medium', 'casual');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (5, 'Blue', 'Small', 'sporty');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (6, 'Red', 'Large', NULL);
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (7, 'Green', 'Medium', 'formal');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (8, 'Yellow', 'Small', 'retro');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (9, 'Blue', 'Large', 'vintage');
INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference) VALUES (10, 'Red', 'Medium', 'modern');
