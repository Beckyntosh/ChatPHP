CREATE TABLE IF NOT EXISTS exercises (
id INT AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(255) NOT NULL,
duration INT NOT NULL,
intensity VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES 
('Running', 30, 'Moderate'),
('Cycling', 45, 'High'),
('Yoga', 60, 'Low'),
('Swimming', 40, 'High'),
('Weightlifting', 50, 'Moderate'),
('Zumba', 45, 'High'),
('Pilates', 55, 'Low'),
('Boxing', 60, 'High'),
('HIIT', 30, 'Moderate'),
('Dance', 50, 'High');
