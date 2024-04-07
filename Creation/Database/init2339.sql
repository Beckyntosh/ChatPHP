CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(50) NOT NULL,
description TEXT,
eventDate DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('JohnDoe', 'johndoe@example.com', 'password123'),
('JaneSmith', 'janesmith@example.com', 'password456'),
('AliceBrown', 'alicebrown@example.com', 'password789'),
('BobWhite', 'bobwhite@example.com', 'passwordabc'),
('EveJohnson', 'evejohnson@example.com', 'passworddef'),
('MikeLee', 'mikelee@example.com', 'passwordghi'),
('SarahDavis', 'sarahdavis@example.com', 'passwordjkl'),
('ChrisEvans', 'chrisevans@example.com', 'passwordmno'),
('MaryTaylor', 'marytaylor@example.com', 'passwordpqr'),
('AlexClark', 'alexclark@example.com', 'passwordstu');