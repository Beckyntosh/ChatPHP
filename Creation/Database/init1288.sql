CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(50),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO exercises (type, duration, intensity) VALUES ('Running', 45, 'High');
INSERT INTO exercises (type, duration, intensity) VALUES ('Weightlifting', 60, 'Moderate');
INSERT INTO exercises (type, duration, intensity) VALUES ('Swimming', 30, 'High');
INSERT INTO exercises (type, duration, intensity) VALUES ('Yoga', 60, 'Low');
INSERT INTO exercises (type, duration, intensity) VALUES ('Cycling', 45, 'Moderate');
INSERT INTO exercises (type, duration, intensity) VALUES ('Hiking', 120, 'High');
INSERT INTO exercises (type, duration, intensity) VALUES ('Pilates', 60, 'Low');
INSERT INTO exercises (type, duration, intensity) VALUES ('Boxing', 90, 'High');
INSERT INTO exercises (type, duration, intensity) VALUES ('Zumba', 45, 'Moderate');
INSERT INTO exercises (type, duration, intensity) VALUES ('CrossFit', 60, 'High');