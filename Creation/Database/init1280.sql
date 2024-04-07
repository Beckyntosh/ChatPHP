CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Cycling', 45, 'high');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Weightlifting', 60, 'high');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Swimming', 40, 'moderate');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Hiking', 90, 'moderate');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Pilates', 45, 'low');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Dancing', 60, 'high');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Boxing', 45, 'high');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Walking', 30, 'low');
