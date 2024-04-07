CREATE TABLE exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exercise VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(50) NOT NULL
);

INSERT INTO exercises (exercise, duration, intensity) VALUES ('Running', 30, 'Moderate');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Cycling', 45, 'High');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Weightlifting', 45, 'High');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Swimming', 30, 'Moderate');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Pilates', 60, 'Low');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Hiking', 90, 'High');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Dancing', 45, 'Moderate');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Jump Rope', 30, 'High');
INSERT INTO exercises (exercise, duration, intensity) VALUES ('Piloxing', 60, 'Moderate');
