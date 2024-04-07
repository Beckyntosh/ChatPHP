CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_type VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Running', 45, 'High');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Weightlifting', 60, 'Medium');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Yoga', 30, 'Low');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Swimming', 60, 'High');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Cycling', 40, 'Medium');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Zumba', 45, 'High');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Walking', 30, 'Low');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('CrossFit', 60, 'High');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('Pilates', 45, 'Medium');
INSERT INTO exercise_log (exercise_type, duration, intensity) VALUES ('HIIT', 50, 'High');
