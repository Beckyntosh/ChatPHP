CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    duration_minutes INT(6) NOT NULL,
    intensity VARCHAR(50) NOT NULL,
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Swimming', 45, 'intense');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Cycling', 60, 'moderate');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Yoga', 60, 'light');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Weightlifting', 45, 'intense');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Pilates', 30, 'light');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Hiking', 120, 'moderate');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Dancing', 60, 'intense');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Rowing', 45, 'moderate');
INSERT INTO exercises (exercise_name, duration_minutes, intensity) VALUES ('Jumping Jacks', 15, 'intense');
