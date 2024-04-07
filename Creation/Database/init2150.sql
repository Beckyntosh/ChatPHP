CREATE TABLE user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    homepage_layout VARCHAR(50),
    theme VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('JohnDoe', 'classic', 'light');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('JaneSmith', 'modern', 'dark');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('AliceJones', 'classic', 'dark');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('BobBrown', 'modern', 'light');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('EmilyDavis', 'classic', 'light');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('DavidLee', 'modern', 'light');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('SarahTaylor', 'classic', 'dark');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('MikeWilson', 'modern', 'dark');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('LauraMoore', 'classic', 'dark');
INSERT INTO user_preferences (username, homepage_layout, theme) VALUES ('MarkEvans', 'modern', 'light');
