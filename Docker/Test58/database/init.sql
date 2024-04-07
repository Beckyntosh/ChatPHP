CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    is_first_login TINYINT NOT NULL DEFAULT 1
);

INSERT INTO users (username, is_first_login) VALUES
('user1', 1),
('user2', 1),
('user3', 1),
('user4', 1),
('user5', 1),
('user6', 1),
('user7', 1),
('user8', 1),
('user9', 1),
('user10', 1);

CREATE TABLE IF NOT EXISTS user_widgets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    widget_type VARCHAR(50) NOT NULL,
    position INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO user_widgets (user_id, widget_type, position) VALUES
(1, 'New Arrivals', 1),
(1, 'Best Sellers', 2),
(1, 'Sales', 3),
(2, 'Best Sellers', 1),
(2, 'Sales', 2),
(3, 'New Arrivals', 1),
(4, 'Sales', 1),
(5, 'New Arrivals', 1),
(6, 'Best Sellers', 1),
(7, 'New Arrivals', 1);
