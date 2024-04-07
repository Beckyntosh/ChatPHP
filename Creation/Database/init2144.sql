CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED NOT NULL,
    homepageLayout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'light');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'list', 'dark');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'dark');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'list', 'light');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'dark');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'light');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'list', 'light');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'dark');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'list', 'dark');
INSERT INTO user_preferences (userId, homepageLayout, theme) VALUES (1, 'list', 'light');
