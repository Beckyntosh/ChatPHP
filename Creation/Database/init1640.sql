CREATE TABLE IF NOT EXISTS custom_exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
instructions TEXT NOT NULL,
video_url VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Push-ups', 'Instructions for doing push-ups', 'https://www.example.com/push-ups'),
('Cycling', 'Instructions for cycling', 'https://www.example.com/cycling'),
('Yoga', 'Instructions for yoga', 'https://www.example.com/yoga'),
('Weight lifting', 'Instructions for weight lifting', 'https://www.example.com/weight-lifting'),
('Running', 'Instructions for running', 'https://www.example.com/running'),
('Swimming', 'Instructions for swimming', 'https://www.example.com/swimming'),
('Planks', 'Instructions for planks', 'https://www.example.com/planks'),
('Pilates', 'Instructions for pilates', 'https://www.example.com/pilates'),
('Squats', 'Instructions for squats', 'https://www.example.com/squats'),
('Dancing', 'Instructions for dancing', 'https://www.example.com/dancing');
