CREATE TABLE exercises (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(50) NOT NULL,
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES 
('Jogging', 45, 'moderate'),
('Weight lifting', 60, 'high'),
('Yoga', 30, 'low'),
('Swimming', 45, 'high'),
('Cycling', 60, 'moderate'),
('Jump rope', 15, 'high'),
('Pilates', 45, 'low'),
('HIIT workout', 20, 'high'),
('Zumba', 60, 'moderate'),
('Walking', 30, 'low');