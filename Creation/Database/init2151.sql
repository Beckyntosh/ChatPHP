CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    modification_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES
(1, 'standard', 'light'),
(2, 'compact', 'dark'),
(3, 'detailed', 'light'),
(4, 'standard', 'dark'),
(5, 'compact', 'relaxed'),
(6, 'detailed', 'light'),
(7, 'standard', 'relaxed'),
(8, 'compact', 'dark'),
(9, 'detailed', 'relaxed'),
(10, 'standard', 'light');
