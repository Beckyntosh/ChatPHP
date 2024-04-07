CREATE TABLE IF NOT EXISTS workout_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Run', 30, 'moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Swim', 45, 'high');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Weightlifting', 50, 'high');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Pilates', 60, 'low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('HIIT', 40, 'high');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Walk', 60, 'low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Dance', 45, 'moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('CrossFit', 50, 'high');
