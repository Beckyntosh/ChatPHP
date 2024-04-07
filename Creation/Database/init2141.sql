CREATE TABLE IF NOT EXISTS UserPreferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId VARCHAR(30) NOT NULL,
homepageLayout VARCHAR(50),
theme VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('1', 'standard', 'light');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('2', 'compact', 'dark');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('3', 'detailed', 'mindbending');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('4', 'standard', 'dark');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('5', 'compact', 'light');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('6', 'detailed', 'mindbending');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('7', 'standard', 'dark');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('8', 'compact', 'light');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('9', 'detailed', 'mindbending');
INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES ('10', 'standard', 'light');