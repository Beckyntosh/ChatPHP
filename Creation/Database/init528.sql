CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Running", 30, "Moderate");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Swimming", 45, "High");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Cycling", 60, "Moderate");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Weightlifting", 40, "High");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Yoga", 75, "Low");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Pilates", 60, "Moderate");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Hiking", 90, "High");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Zumba", 45, "Moderate");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("CrossFit", 60, "High");
INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ("Dancing", 120, "Moderate");
