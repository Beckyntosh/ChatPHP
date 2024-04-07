CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Cycling', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Weightlifting', 60, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Yoga', 90, 'low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Pilates', 60, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Zumba', 75, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('CrossFit', 60, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Hiking', 120, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Dancing', 90, 'moderate');
