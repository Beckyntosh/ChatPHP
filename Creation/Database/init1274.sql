CREATE TABLE IF NOT EXISTS exercises (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(50) NOT NULL,
  duration INT(10),
  intensity VARCHAR(50),
  log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Cycling', 45, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Swimming', 60, 'Moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Hiking', 90, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Pilates', 60, 'Low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Dancing', 45, 'Moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Kickboxing', 60, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('CrossFit', 60, 'High');