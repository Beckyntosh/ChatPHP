CREATE TABLE IF NOT EXISTS ExerciseLog (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Swimming', 45, 'High');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Cycling', 40, 'Moderate');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Pilates', 50, 'Low');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Walking', 30, 'Moderate');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Dancing', 60, 'High');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('CrossFit', 45, 'High');
INSERT INTO ExerciseLog (exercise_type, duration, intensity) VALUES ('Zumba', 60, 'Moderate');
