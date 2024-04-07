CREATE TABLE IF NOT EXISTS ExerciseLog (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise VARCHAR(30) NOT NULL,
    duration INT(11) NOT NULL,
    intensity VARCHAR(30) NOT NULL,
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Walking', 60, 'low');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Weightlifting', 60, 'high');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Yoga', 75, 'low');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('HIIT', 30, 'high');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Pilates', 45, 'moderate');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('Zumba', 60, 'high');
INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES ('CrossFit', 60, 'high');
