CREATE TABLE user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'standard', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'compact', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'detailed', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'standard', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'compact', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'detailed', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'standard', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'compact', 'dark');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'detailed', 'light');
INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES (1, 'standard', 'dark');
