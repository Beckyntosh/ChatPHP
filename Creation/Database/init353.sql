CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    homepage_layout VARCHAR(20) NOT NULL,
    theme VARCHAR(20) NOT NULL
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'standard', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'compact', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'standard', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'compact', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'standard', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'compact', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'standard', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'compact', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'standard', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'compact', 'dark');
