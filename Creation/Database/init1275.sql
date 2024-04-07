CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Run', 30, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Jumping Jacks', 15, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Weightlifting', 60, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Pilates', 45, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Dance', 30, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Hiking', 90, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Zumba', 45, 'high');
