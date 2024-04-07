CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
register_date TIMESTAMP
);

INSERT INTO volunteers (fullname, email, event, register_date) VALUES
('John Doe', 'johndoe@example.com', 'Local Charity Event', NOW()),
('Jane Smith', 'janesmith@example.com', 'Community Clean-Up', NOW()),
('Michael Johnson', 'michaeljohnson@example.com', 'Food Drive', NOW()),
('Sarah Lee', 'sarahlee@example.com', 'Local Charity Event', NOW()),
('David Brown', 'davidbrown@example.com', 'Community Clean-Up', NOW()),
('Emily White', 'emilywhite@example.com', 'Food Drive', NOW()),
('Alex Green', 'alexgreen@example.com', 'Local Charity Event', NOW()),
('Olivia Black', 'oliviablack@example.com', 'Community Clean-Up', NOW()),
('William Gray', 'williamgray@example.com', 'Food Drive', NOW()),
('Sophia Brown', 'sophiabrown@example.com', 'Local Charity Event', NOW());