CREATE TABLE IF NOT EXISTS ExerciseLog (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exerciseType VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    logDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Swimming', 45, 'Moderate');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Cycling', 60, 'High');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Pilates', 45, 'Low');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Hiking', 90, 'Moderate');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Dancing', 60, 'High');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('Boxing', 30, 'Low');
INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES ('CrossFit', 60, 'High');
