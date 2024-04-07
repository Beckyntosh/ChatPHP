CREATE TABLE IF NOT EXISTS workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise VARCHAR(255) NOT NULL,
    duration INT(10) NOT NULL,
    intensity VARCHAR(50) NOT NULL,
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Cycling', 45, 'Moderate');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Swimming', 60, 'High');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Pilates', 30, 'Low');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('HIIT', 20, 'High');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Walking', 45, 'Low');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Dancing', 60, 'Moderate');
INSERT INTO workout_log (exercise, duration, intensity) VALUES ('Rowing', 30, 'High');