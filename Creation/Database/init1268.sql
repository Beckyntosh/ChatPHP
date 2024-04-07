CREATE TABLE IF NOT EXISTS workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    duration_minutes INT(10),
    intensity VARCHAR(15),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Cycling', 60, 'moderate');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Hiking', 90, 'high');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Pilates', 45, 'low');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Zumba', 60, 'moderate');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('CrossFit', 60, 'high');
INSERT INTO workout_log (exercise_name, duration_minutes, intensity) VALUES ('Walking', 45, 'low');
