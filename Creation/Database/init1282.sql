CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Weightlifting', 45, 'intense');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'light');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Cycling', 40, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('HIIT', 25, 'intense');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Walking', 60, 'light');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Pilates', 50, 'light');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Dancing', 35, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Boxing', 60, 'intense');
