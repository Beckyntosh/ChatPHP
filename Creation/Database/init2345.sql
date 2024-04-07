CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'jane.smith@example.com', 'mysecretpassword'),
('alex_brown', 'alex.brown@example.com', 'securepass123'),
('emily_jones', 'emily.jones@example.com', 'pass321'),
('michael_clark', 'michael.clark@example.com', 'letmein'),
('sarah_wilson', 'sarah.wilson@example.com', 'abc123'),
('chris_miller', 'chris.miller@example.com', 'password456'),
('laura_taylor', 'laura.taylor@example.com', 'qwerty'),
('kevin_adams', 'kevin.adams@example.com', 'password789'),
('nicole_roberts', 'nicole.roberts@example.com', 'securepassword');