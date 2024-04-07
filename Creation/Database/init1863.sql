CREATE TABLE user_preferences (
    user_id INT PRIMARY KEY,
    homepage_layout VARCHAR(50),
    theme VARCHAR(50)
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES
(1, 'layout-1', 'light'),
(2, 'layout-2', 'dark'),
(3, 'layout-1', 'light'),
(4, 'layout-2', 'dark'),
(5, 'layout-1', 'dark'),
(6, 'layout-2', 'light'),
(7, 'layout-1', 'dark'),
(8, 'layout-2', 'light'),
(9, 'layout-1', 'light'),
(10, 'layout-2', 'dark');