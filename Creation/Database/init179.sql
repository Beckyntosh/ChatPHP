-- init.sql for setting up the users table

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

-- Creating the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserting some sample user data
-- Note: The passwords should be hashed using PHP's password_hash() function before insertion for real applications.
-- For demonstration purposes, we're inserting plain text passwords, but DO NOT do this in a production environment.

INSERT INTO users (username, password) VALUES
('user1', '$2y$10$TKh8H1.PfQx37YgCzwiKum1fZDwrU/6KEFSjNDF8A/fIDqy7HCEC2'), -- password: 'secret'
('user2', '$2y$10$TKh8H1.PfQx37YgCzwiKuoJGb2G9WvEElJx7H8BOdFdhKpAdJzETO'), -- password: 'letmein'
('user3', '$2y$10$TKh8H1.PfQx37YgCzwiKu.ZD.FefsGXIsGhxMslPdGHxdT3E5kY3K'); -- password: 'password'

-- Remember: ALWAYS store hashed passwords in your actual applications!
