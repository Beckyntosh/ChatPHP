CREATE TABLE IF NOT EXISTS UserPreferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
homepageLayout VARCHAR(50) NOT NULL,
theme VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'light');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'list', 'dark');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'realistic');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'list', 'light');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'dark');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'list', 'realistic');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'light');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'list', 'dark');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'grid', 'realistic');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (1, 'list', 'light');