CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    theme VARCHAR(30) NOT NULL,
    homepage_layout VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'dark', 'default');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'light', 'compact');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'cryptic', 'spacious');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'dark', 'compact');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'light', 'default');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'cryptic', 'spacious');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'dark', 'compact');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'light', 'default');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'cryptic', 'spacious');
INSERT INTO user_preferences (user_id, theme, homepage_layout) VALUES (1, 'dark', 'compact');