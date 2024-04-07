CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    dashboard_layout VARCHAR(255),
    first_login BOOLEAN DEFAULT TRUE
);

-- Create 'widgets' table
CREATE TABLE IF NOT EXISTS widgets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    widget_type VARCHAR(50) NOT NULL,
    position INT(5),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert values into 'users' table
INSERT INTO users (username, password, dashboard_layout, first_login) VALUES
('user1', 'password1', 'layout1', TRUE),
('user2', 'password2', 'layout2', TRUE),
('user3', 'password3', 'layout3', TRUE),
('user4', 'password4', 'layout4', TRUE),
('user5', 'password5', 'layout5', TRUE),
('user6', 'password6', 'layout6', TRUE),
('user7', 'password7', 'layout7', TRUE),
('user8', 'password8', 'layout8', TRUE),
('user9', 'password9', 'layout9', TRUE),
('user10', 'password10', 'layout10', TRUE);

-- Insert values into 'widgets' table
INSERT INTO widgets (user_id, widget_type, position) VALUES
(1, 'type1', 1),
(2, 'type2', 2),
(3, 'type3', 3),
(4, 'type4', 4),
(5, 'type5', 5),
(6, 'type6', 6),
(7, 'type7', 7),
(8, 'type8', 8),
(9, 'type9', 9),
(10, 'type10', 10);
