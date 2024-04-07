CREATE TABLE IF NOT EXISTS exercise_log (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	exercise_name VARCHAR(30) NOT NULL,
	duration INT(11) NOT NULL,
	intensity VARCHAR(30) NOT NULL,
	log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'light');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Swimming', 40, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Cycling', 50, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Pilates', 45, 'light');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Hiking', 120, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Dancing', 60, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Elliptical', 30, 'light');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('CrossFit', 60, 'high');