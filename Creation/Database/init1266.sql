CREATE TABLE IF NOT EXISTS exercise_log (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(50) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Run', 30, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Swim', 45, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Cycling', 40, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Weightlifting', 50, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Pilates', 55, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('HIIT', 20, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Dance', 35, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Walking', 60, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Zumba', 30, 'moderate');
