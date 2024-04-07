CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
event_date DATE NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, password, email) VALUES 
('user1', 'password1', 'user1@example.com'),
('user2', 'password2', 'user2@example.com'),
('user3', 'password3', 'user3@example.com'),
('user4', 'password4', 'user4@example.com'),
('user5', 'password5', 'user5@example.com'),
('user6', 'password6', 'user6@example.com'),
('user7', 'password7', 'user7@example.com'),
('user8', 'password8', 'user8@example.com'),
('user9', 'password9', 'user9@example.com'),
('user10', 'password10', 'user10@example.com');
