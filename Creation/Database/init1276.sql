CREATE TABLE IF NOT EXISTS workout_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_type VARCHAR(30) NOT NULL,
duration_minutes INT NOT NULL,
intensity VARCHAR(30) NOT NULL,
log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Swimming', 40, 'high');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Walking', 20, 'low');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('HIIT', 30, 'high');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Pilates', 50, 'moderate');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Dancing', 60, 'low');
INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES ('Hiking', 90, 'high');
