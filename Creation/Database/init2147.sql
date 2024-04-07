CREATE TABLE IF NOT EXISTS UserPreferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) NOT NULL,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

-- Insert values into UserPreferences table
INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (1, 'standard', 'light');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (2, 'compact', 'dark');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (3, 'detailed', 'light');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (4, 'standard', 'dark');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (5, 'compact', 'light');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (6, 'detailed', 'dark');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (7, 'standard', 'light');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (8, 'compact', 'dark');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (9, 'detailed', 'light');

INSERT INTO UserPreferences (userid, homepage_layout, theme)
VALUES (10, 'standard', 'dark');
