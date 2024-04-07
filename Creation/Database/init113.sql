CREATE TABLE IF NOT EXISTS workout_log (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_type VARCHAR(30) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Running', 30, 'High');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Weightlifting', 45, 'Medium');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Cycling', 40, 'High');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Swimming', 60, 'Medium');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Pilates', 45, 'Low');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('CrossFit', 50, 'High');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Zumba', 60, 'Medium');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('HIIT', 35, 'High');
INSERT INTO workout_log (exercise_type, duration, intensity) VALUES ('Piloxing', 45, 'High');
