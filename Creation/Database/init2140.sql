CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    homepage_layout VARCHAR(50) NOT NULL,
    theme VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES 
(1, 'compact', 'light'),
(2, 'spacious', 'dark'),
(3, 'compact', 'dark'),
(4, 'spacious', 'light'),
(5, 'compact', 'dark'),
(6, 'spacious', 'light'),
(7, 'compact', 'light'),
(8, 'spacious', 'dark'),
(9, 'compact', 'dark'),
(10, 'spacious', 'light');