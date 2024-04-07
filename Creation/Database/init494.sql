CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('30-minute run', 30, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Weight lifting', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Cycling', 60, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Walking', 40, 'low');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Pilates', 50, 'moderate');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Zumba', 45, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('HIIT', 30, 'high');
INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('Dance Cardio', 60, 'moderate');
