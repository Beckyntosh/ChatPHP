
CREATE TABLE IF NOT EXISTS exercise_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(50)
);

INSERT INTO exercise_log (type, duration, intensity) VALUES
("Running", 30, "moderate"),
("Swimming", 45, "high"),
("Cycling", 60, "moderate"),
("Weightlifting", 50, "high"),
("Yoga", 40, "low"),
("Zumba", 45, "moderate"),
("Pilates", 55, "low"),
("Kickboxing", 60, "high"),
("Hiking", 90, "moderate"),
("Dancing", 30, "high");