init.sql:

CREATE TABLE IF NOT EXISTS workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise_name, duration, intensity) VALUES 
('30-minute run', 30, 'moderate'),
('Weight lifting', 45, 'high'),
('Yoga', 60, 'low'),
('Swimming', 45, 'moderate'),
('Cycling', 60, 'high'),
('Walking', 45, 'low'),
('Pilates', 60, 'moderate'),
('Jump rope', 30, 'high'),
('Dancing', 45, 'moderate'),
('HIIT', 30, 'high');