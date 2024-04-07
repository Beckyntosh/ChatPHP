CREATE TABLE workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Cycling', 60, 'moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Yoga', 90, 'low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Weight Training', 45, 'high');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Walking', 60, 'low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Aerobics', 45, 'moderate');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Dancing', 60, 'high');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Pilates', 45, 'low');
INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('Jump Rope', 30, 'high');