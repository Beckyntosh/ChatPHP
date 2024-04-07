CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verified BOOLEAN DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS email_verification (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
exp_date DATETIME
);

INSERT INTO users (username, email, password, verified, reg_date) VALUES ('john_doe', 'john.doe@example.com', 'password123', 1, NOW()),
('jane_smith', 'jane.smith@example.com', 'password456', 0, NOW()),
('eric_wilson', 'eric.wilson@example.com', 'password789', 1, NOW()),
('lisa_johnson', 'lisa.johnson@example.com', 'passwordabc', 0, NOW()),
('alex_miller', 'alex.miller@example.com', 'passworddef', 1, NOW()),
('sarah_adams', 'sarah.adams@example.com', 'passwordghi', 0, NOW()),
('mike_carter', 'mike.carter@example.com', 'passwordjkl', 1, NOW()),
('emily_brown', 'emily.brown@example.com', 'passwordmno', 0, NOW()),
('adam_thomas', 'adam.thomas@example.com', 'passwordpqr', 1, NOW()),
('laura_wright', 'laura.wright@example.com', 'passwordstu', 0, NOW());

INSERT INTO email_verification (email, token, exp_date) VALUES ('john.doe@example.com', '7589201', '2023-01-01 12:00:00'),
('jane.smith@example.com', '1592048', '2023-01-01 12:00:00'),
('eric.wilson@example.com', '2693410', '2023-01-01 12:00:00'),
('lisa.johnson@example.com', '0154872', '2023-01-01 12:00:00'),
('alex.miller@example.com', '7859342', '2023-01-01 12:00:00'),
('sarah.adams@example.com', '3958241', '2023-01-01 12:00:00'),
('mike.carter@example.com', '7261849', '2023-01-01 12:00:00'),
('emily.brown@example.com', '3910485', '2023-01-01 12:00:00'),
('adam.thomas@example.com', '1948052', '2023-01-01 12:00:00'),
('laura.wright@example.com', '6092317', '2023-01-01 12:00:00');
