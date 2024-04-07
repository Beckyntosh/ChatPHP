CREATE TABLE IF NOT EXISTS workout_log (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(50) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Yoga', 45, 'Low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Weightlifting', 60, 'High');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Cycling', 45, 'Moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Swimming', 60, 'High');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Pilates', 60, 'Low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('HIIT', 30, 'High');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Walking', 45, 'Low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Dance', 60, 'Moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Plyometrics', 30, 'High');