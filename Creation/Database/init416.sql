-- init.sql for Newsletter Signup with Email Confirmation
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(32) NOT NULL,
    confirmed TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- Insert dummy values into newsletter_subscribers table
USE my_database;

INSERT INTO newsletter_subscribers (email, token, confirmed) VALUES
('alice@example.com', MD5(RAND()), 1),
('bob@example.com', MD5(RAND()), 0),
('charlie@example.com', MD5(RAND()), 0),
('diana@example.com', MD5(RAND()), 1),
('evan@example.com', MD5(RAND()), 1),
('fiona@example.com', MD5(RAND()), 0),
('george@example.com', MD5(RAND()), 1),
('hannah@example.com', MD5(RAND()), 0),
('ian@example.com', MD5(RAND()), 1),
('jenny@example.com', MD5(RAND()), 0);
