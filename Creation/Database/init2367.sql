CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'password123'),
('jane_smith', 'jane.smith@example.com', 'securepassword'),
('mike_brown', 'mike.brown@example.com', 'pass123'),
('amy_jones', 'amy.jones@example.com', 'userpass'),
('chris_wilson', 'chris.wilson@example.com', '1234pass'),
('lisa_taylor', 'lisa.taylor@example.com', 'password456'),
('ryan_clark', 'ryan.clark@example.com', 'qweasdzxc'),
('sara_miller', 'sara.miller@example.com', 'passpass'),
('adam_king', 'adam.king@example.com', 'password789'),
('emma_scott', 'emma.scott@example.com', 'p@ssw0rd');