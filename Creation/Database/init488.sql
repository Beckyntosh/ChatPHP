CREATE TABLE IF NOT EXISTS exercises (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        activity VARCHAR(255) NOT NULL,
        duration INT(11) NOT NULL,
        intensity VARCHAR(50) NOT NULL,
        date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );

INSERT INTO exercises (activity, duration, intensity) VALUES
('Running', 30, 'moderate'),
('Cycling', 45, 'high'),
('Swimming', 60, 'low'),
('Yoga', 40, 'moderate'),
('Weightlifting', 50, 'high'),
('Dancing', 35, 'moderate'),
('Walking', 45, 'low'),
('Pilates', 55, 'moderate'),
('Hiking', 70, 'high'),
('Jumping Jacks', 20, 'low');
