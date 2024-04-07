CREATE TABLE exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    duration INT NOT NULL,
    type VARCHAR(30) NOT NULL,
    intensity VARCHAR(30) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (duration, type, intensity) VALUES (30, 'Running', 'High');
INSERT INTO exercises (duration, type, intensity) VALUES (45, 'Cycling', 'Medium');
INSERT INTO exercises (duration, type, intensity) VALUES (60, 'Weightlifting', 'High');
INSERT INTO exercises (duration, type, intensity) VALUES (45, 'Yoga', 'Low');
INSERT INTO exercises (duration, type, intensity) VALUES (30, 'Swimming', 'Medium');
INSERT INTO exercises (duration, type, intensity) VALUES (60, 'CrossFit', 'High');
INSERT INTO exercises (duration, type, intensity) VALUES (45, 'Pilates', 'Low');
INSERT INTO exercises (duration, type, intensity) VALUES (60, 'Kickboxing', 'High');
INSERT INTO exercises (duration, type, intensity) VALUES (30, 'Walking', 'Low');
INSERT INTO exercises (duration, type, intensity) VALUES (45, 'Zumba', 'Medium');