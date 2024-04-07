CREATE TABLE exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO exercises (type, duration, intensity) VALUES ('running', 30, 'moderate');
INSERT INTO exercises (type, duration, intensity) VALUES ('cycling', 45, 'high');
INSERT INTO exercises (type, duration, intensity) VALUES ('swimming', 60, 'low');
INSERT INTO exercises (type, duration, intensity) VALUES ('weightlifting', 60, 'high');
INSERT INTO exercises (type, duration, intensity) VALUES ('yoga', 45, 'low');
INSERT INTO exercises (type, duration, intensity) VALUES ('pilates', 60, 'moderate');
INSERT INTO exercises (type, duration, intensity) VALUES ('kickboxing', 30, 'high');
INSERT INTO exercises (type, duration, intensity) VALUES ('dancing', 45, 'moderate');
INSERT INTO exercises (type, duration, intensity) VALUES ('hiking', 120, 'high');
INSERT INTO exercises (type, duration, intensity) VALUES ('aerobics', 60, 'low');