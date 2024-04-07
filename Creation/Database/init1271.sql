CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Cycling', 45, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Swimming', 60, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Weight lifting', 45, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Pilates', 60, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('HIIT', 30, 'high');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Zumba', 45, 'moderate');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Walking', 60, 'low');
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('Kickboxing', 45, 'high');