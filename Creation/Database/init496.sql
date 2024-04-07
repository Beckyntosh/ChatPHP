CREATE TABLE IF NOT EXISTS exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES 
('Running', 30, 'moderate'),
('Cycling', 45, 'high'),
('Swimming', 60, 'moderate'),
('Weightlifting', 60, 'high'),
('Yoga', 45, 'low'),
('Skipping rope', 20, 'high'),
('Walking', 40, 'moderate'),
('Dancing', 50, 'moderate'),
('Rowing', 45, 'high'),
('Pilates', 30, 'low');
