CREATE TABLE UserPreferences (
    userId INT PRIMARY KEY,
    theme VARCHAR(50),
    layout VARCHAR(50)
);

INSERT INTO UserPreferences (userId, theme, layout) VALUES (1, 'light', 'standard');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (2, 'dark', 'wide');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (3, 'light', 'wide');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (4, 'dark', 'standard');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (5, 'light', 'standard');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (6, 'dark', 'standard');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (7, 'light', 'wide');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (8, 'dark', 'wide');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (9, 'light', 'standard');
INSERT INTO UserPreferences (userId, theme, layout) VALUES (10, 'dark', 'wide');