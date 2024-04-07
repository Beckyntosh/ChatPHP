CREATE TABLE Exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Swimming', 45, 'high');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Cycling', 60, 'moderate');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Pilates', 60, 'low');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Dancing', 45, 'moderate');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Walking', 60, 'low');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('HIIT', 30, 'high');
INSERT INTO Exercises (exercise, duration, intensity) VALUES ('Crossfit', 45, 'high');
