CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_type VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Cycling', 45, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Weightlifting', 60, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Swimming', 45, 'Moderate');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Walking', 40, 'Low');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Pilates', 50, 'Low');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Zumba', 60, 'Moderate');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('HIIT', 30, 'High');
INSERT INTO exercises (exercise_type, duration, intensity) VALUES ('Dancing', 45, 'Moderate');
