CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL, 
    duration_minutes INT NOT NULL, 
    intensity VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Running', 30, 'moderate');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Yoga', 45, 'low');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Weightlifting', 60, 'high');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Cycling', 45, 'moderate');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Swimming', 60, 'high');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Pilates', 30, 'low');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('HIIT', 20, 'high');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Walking', 40, 'low');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('Zumba', 45, 'moderate');
INSERT INTO exercises (type, duration_minutes, intensity) VALUES ('CrossFit', 60, 'high');