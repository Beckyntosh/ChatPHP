CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
homepage_layout VARCHAR(30) NOT NULL,
theme VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('1', 'default', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('2', 'mathematical', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('3', 'compact', 'math_style');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('4', 'default', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('5', 'mathematical', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('6', 'compact', 'math_style');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('7', 'default', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('8', 'mathematical', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('9', 'compact', 'math_style');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('10', 'default', 'light');
