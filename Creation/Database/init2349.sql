CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Inserting 10 example values into the users table
INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$5WOrXVUvuAVRybq3.66leftt/916YeyOiGLPYzUq82D3MMxv0OMYC', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$CiDh9pNQ4b.X9oRb7bn2veK8OUzXJjvzjaHSCIqm9GmVJEdQJrdKy', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_jackson', '$2y$10$WX6sJ6Aupx6iDKA6202f0uhNSbrQRU6UzbpMvu.7X8JwVk9e9MKKa', 'michael.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_davis', '$2y$10$78NRc03LBmZzeMpM/H49leS/vR0.p/7XCc8pYToY.FBYok/SiYZBe', 'sarah.davis@example.com');
INSERT INTO users (username, password, email) VALUES ('adam_wilson', '$2y$10$m5ZuJAX6fLbG4eA1w1PGwOPpBZfG.XJo0OraDbJ0t7SQ9uKyYKI7G', 'adam.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_brown', '$2y$10$4MnaRq0xljHYVo6agmai4uQoZ6fo94pKy5zB69EeWTO168guiMI7q', 'emily.brown@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_adams', '$2y$10$4latYCyF6idXVPcTHpYR/eodsX0DclXsDzL6wl4PD1.JN9jbtxeYa', 'chris.adams@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_jackson', '$2y$10$Q26fGz80Gj4wxE5p/jYIG.e8RG22iGt3ISSDSiwVdKCQtnRpBz5Je', 'lisa.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('kevin_miller', '$2y$10$KVBbHjgp.h16KohNIt3Tbun4uQsObqG.aCf8q9PbN0Z0VZA4ZWGDq', 'kevin.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('natalie_cook', '$2y$10$HfJ6TGVr0V5OV.2JK64KwOD77r9d35V50MY3vXKximfre6ftVtr5i', 'natalie.cook@example.com');
