CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values into user_preferences table
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'classic', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (2, 'modern', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (3, 'compact', 'colorful');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (4, 'classic', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (5, 'modern', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (6, 'compact', 'colorful');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (7, 'classic', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (8, 'modern', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (9, 'compact', 'colorful');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (10, 'classic', 'dark');
