CREATE TABLE IF NOT EXISTS exercises (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(30) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  reg_date TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Cycling', 60, 'Moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Pilates', 45, 'Low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Hiking', 90, 'Moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Dancing', 60, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Boxing', 45, 'High');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('HIIT', 30, 'High');