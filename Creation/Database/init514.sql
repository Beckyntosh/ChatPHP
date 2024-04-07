CREATE TABLE IF NOT EXISTS exercise_logs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_type VARCHAR(30) NOT NULL,
  duration_minutes INT(10),
  intensity VARCHAR(10),
  log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Run', 30, 'moderate');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Hiking', 90, 'moderate');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Swimming', 60, 'high');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Pilates', 60, 'low');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Boxing', 60, 'high');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Dance', 30, 'moderate');
INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES ('Pilates', 45, 'low');