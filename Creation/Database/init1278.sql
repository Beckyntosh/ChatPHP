CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration_minutes INT(10),
intensity VARCHAR(30),
log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Swimming', 40, 'Moderate');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Cycling', 50, 'High');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Pilates', 45, 'Low');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Hiking', 90, 'Moderate');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Dancing', 60, 'High');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('CrossFit', 75, 'High');
INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES ('Zumba', 45, 'Moderate');
