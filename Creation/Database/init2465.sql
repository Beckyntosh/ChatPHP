
-- Create users table
CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
);

-- Create appointments table
CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_id INT(6) UNSIGNED,
appointment_time DATETIME,
details TEXT,
FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert values into users table
INSERT INTO users (username, email, password) VALUES 
('JohnDoe', 'johndoe@example.com', 'password123'),
('JaneSmith', 'janesmith@example.com', 'pass321word'),
('MikeJohnson', 'mike@example.com', 'qwerty'),
('EmilyBrown', 'emily@example.com', 'abc123'),
('ChrisDavis', 'chris@example.com', 'password456');

-- Insert values into appointments table
INSERT INTO appointments (user_id, appointment_time, details) VALUES 
(1, '2022-12-15 10:00:00', 'Dental checkup'),
(2, '2022-12-20 14:30:00', 'Vaccination appointment'),
(3, '2023-01-05 09:00:00', 'Surgery consultation'),
(4, '2023-01-10 11:30:00', 'Grooming session'),
(5, '2023-01-15 13:00:00', 'Training session');
