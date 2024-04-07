CREATE DATABASE IF NOT EXISTS my_database;

USE my_database;

CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    email VARCHAR(50),
    preferences VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email, preferences, reg_date) VALUES
('john_doe', 'password123', 'john.doe@example.com', 'gardening_tips,new_tools,plant_care', NOW()),
('jane_smith', 'qwerty321', 'jane.smith@example.com', 'new_tools,plant_care', NOW()),
('mike_wilson', 'letmein', 'mike.wilson@example.com', 'gardening_tips,plant_care', NOW()),
('sarah_jones', 'p@ssw0rd', 'sarah.jones@example.com', 'gardening_tips,new_tools', NOW()),
('chris_brown', 'abc123', 'chris.brown@example.com', 'new_tools', NOW()),
('lisa_taylor', 'password', 'lisa.taylor@example.com', 'plant_care', NOW()),
('alex_miller', 'ilovegardening', 'alex.miller@example.com', 'gardening_tips,new_tools,plant_care', NOW()),
('emily_clark', 'emily1234', 'emily.clark@example.com', 'plant_care', NOW()),
('david_white', 'davidpass', 'david.white@example.com', 'new_tools,plant_care', NOW()),
('amanda_green', 'greenthumb', 'amanda.green@example.com', 'gardening_tips,plant_care', NOW());