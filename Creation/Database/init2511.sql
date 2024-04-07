CREATE TABLE IF NOT EXISTS Languages (
id INT AUTO_INCREMENT PRIMARY KEY,
language_name VARCHAR(50) NOT NULL
);

INSERT INTO Languages (language_name) VALUES 
('English'), 
('French'), 
('Spanish'), 
('German'), 
('Italian'), 
('Chinese'), 
('Japanese'), 
('Russian'), 
('Portuguese'), 
('Arabic')
ON DUPLICATE KEY UPDATE language_name=language_name;

CREATE TABLE IF NOT EXISTS Users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
language_id INT,
FOREIGN KEY(language_id) REFERENCES Languages(id)
);