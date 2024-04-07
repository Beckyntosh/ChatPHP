CREATE TABLE IF NOT EXISTS ExerciseLog (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(15),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Run', 30, 'moderate');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Weights', 45, 'high');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'moderate');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Cycling', 60, 'high');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Hiking', 90, 'moderate');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Pilates', 60, 'low');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Rowing', 30, 'high');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Dancing', 45, 'moderate');
INSERT INTO ExerciseLog (exercise_name, duration, intensity) VALUES ('Kickboxing', 60, 'high');
