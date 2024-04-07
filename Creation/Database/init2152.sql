CREATE TABLE user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    homepage_layout VARCHAR(50) NOT NULL,
    theme VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (1, 'grid', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (2, 'list', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (3, 'grid', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (4, 'grid', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (5, 'list', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (6, 'grid', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (7, 'grid', 'light');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (8, 'list', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (9, 'grid', 'dark');
INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (10, 'list', 'light');