CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES 
('Parkour Training', 'Jump, climb, roll', 'https://example.com/parkour_video'),
('Yoga Flow', 'Relax, stretch, breathe', 'https://example.com/yoga_video'),
('HIIT Workout', 'Intense, short bursts', 'https://example.com/hiit_video'),
('Swimming Drills', 'Improve strokes', 'https://example.com/swimming_video'),
('Strength Training', 'Lift weights', 'https://example.com/strength_training_video'),
('Pilates Routine', 'Core strengthening', 'https://example.com/pilates_video'),
('Dance Cardio', 'Fun cardio session', 'https://example.com/dance_cardio_video'),
('Circuit Training', 'Full-body workout', 'https://example.com/circuit_training_video'),
('Meditation Practice', 'Mindfulness and relaxation', NULL),
('Boxing Workout', 'Punch and jab', 'https://example.com/boxing_video');
