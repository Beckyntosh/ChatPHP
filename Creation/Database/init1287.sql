CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    activity VARCHAR(50) NOT NULL,
    duration INT(11) NOT NULL,
    intensity VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exercises (activity, duration, intensity) VALUES ('30-minute run', 30, 'moderate');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Weightlifting', 45, 'high');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Yoga', 60, 'low');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Swimming', 60, 'high');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Pilates', 30, 'low');
INSERT INTO exercises (activity, duration, intensity) VALUES ('HIIT workout', 20, 'high');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Dance class', 60, 'moderate');
INSERT INTO exercises (activity, duration, intensity) VALUES ('Hiking', 90, 'high');
INSERT INTO exercises (activity, duration, intensity) VALUES ('CrossFit', 60, 'high');
