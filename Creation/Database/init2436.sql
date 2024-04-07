CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS news_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    preference VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password123'),
('JaneSmith', 'janesmith@example.com', 'securepass'),
('AliceBrown', 'alicebrown@example.com', 'pass123'),
('DavidJohnson', 'davidjohnson@example.com', 'password'),
('SarahAdams', 'sarahadams@example.com', 'secure123'),
('MichaelHall', 'michaelhall@example.com', 'password456'),
('LauraClark', 'lauraclark@example.com', 'pass567'),
('RobertWhite', 'robertwhite@example.com', 'securepass123'),
('MariaWilliams', 'mariawilliams@example.com', 'newpass'),
('WilliamLee', 'williamlee@example.com', 'oldpass');

INSERT INTO news_preferences (user_id, preference) VALUES (1, 'Latest Arrivals'),
(1, 'Sale Notifications'),
(1, 'Design Tips'),
(2, 'Events'),
(3, 'Latest Arrivals'),
(3, 'Sale Notifications'),
(4, 'Design Tips'),
(5, 'Events'),
(6, 'Latest Arrivals'),
(8, 'Sale Notifications'),
(9, 'Design Tips'),
(10, 'Events');
