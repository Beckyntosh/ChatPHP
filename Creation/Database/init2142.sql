CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
homepage_layout VARCHAR(50) NOT NULL,
theme VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'modern', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (2, 'classic', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (3, 'medieval', 'medieval');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (4, 'modern', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (5, 'classic', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (6, 'medieval', 'medieval');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (7, 'modern', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (8, 'classic', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (9, 'medieval', 'medieval');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (10, 'modern', 'light');
