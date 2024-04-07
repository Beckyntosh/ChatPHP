CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO user_preferences (homepage_layout, theme) VALUES ('standard', 'light');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('compact', 'dark');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('standard', 'dark');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('compact', 'light');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('standard', 'dark');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('compact', 'light');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('standard', 'light');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('compact', 'dark');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('standard', 'dark');
INSERT INTO user_preferences (homepage_layout, theme) VALUES ('compact', 'light');
