CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity ENUM('low', 'moderate', 'high') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Cycling', 40, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Swimming', 50, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Pilates', 50, 'low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Hiking', 60, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Dance Workout', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Rowing', 30, 'low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Kickboxing', 60, 'high');
