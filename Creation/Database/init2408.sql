CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    trial_start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email, trial_start_date) VALUES 
('john_doe', 'password123', 'john.doe@example.com', '2022-01-15 12:00:00'),
('jane_smith', 'pass456', 'jane.smith@example.com', '2022-01-16 08:30:00'),
('sam_jackson', 'qwerty', 'sam.jackson@example.com', '2022-01-17 16:45:00'),
('amy_brown', 'abc123', 'amy.brown@example.com', '2022-01-18 10:15:00'),
('chris_green', 'hello987', 'chris.green@example.com', '2022-01-19 14:20:00'),
('lisa_wilson', 'passtest', 'lisa.wilson@example.com', '2022-01-20 11:45:00'),
('matt_jones', 'newuser', 'matt.jones@example.com', '2022-01-21 17:30:00'),
('sarah_white', 'testpass', 'sarah.white@example.com', '2022-01-22 09:40:00'),
('ryan_clark', 'securepwd', 'ryan.clark@example.com', '2022-01-23 13:55:00'),
('katie_baker', 'user987', 'katie.baker@example.com', '2022-01-24 16:00:00');
