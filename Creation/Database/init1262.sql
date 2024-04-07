CREATE TABLE IF NOT EXISTS ExerciseLog (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(10),
    reg_date TIMESTAMP
);

INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Cycling', 40, 'moderate');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Swimming', 50, 'high');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Pilates', 45, 'low');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Crossfit', 60, 'high');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Hiking', 90, 'moderate');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Dancing', 60, 'low');
INSERT INTO ExerciseLog (type, duration, intensity) VALUES ('Boxing', 45, 'high');