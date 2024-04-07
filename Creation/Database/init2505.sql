CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_name VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create table for users
CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
password VARCHAR(50),
language_preference VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert initial languages into the languages table
INSERT INTO languages (language_name) VALUES ('English'),('Spanish'),('French'),('German'),('Italian'),('Russian'),('Chinese'),('Japanese'),('Portuguese'),('Arabic') ON DUPLICATE KEY UPDATE language_name=language_name;
