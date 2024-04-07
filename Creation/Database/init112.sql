CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Jogging', 30, 'Medium');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Cycling', 60, 'Medium');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Swimming', 45, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Pilates', 60, 'Low');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Hiking', 90, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Zumba', 45, 'Medium');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Piloxing', 60, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('CrossFit', 60, 'High');