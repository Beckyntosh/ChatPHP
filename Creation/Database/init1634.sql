CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES
('Parkour Training', 'Jump, climb, and move efficiently in urban spaces.', 'https://www.example.com/parkour_video1'),
('Yoga Flow', 'Practice mindfulness and flexibility with flowing yoga sequences.', 'https://www.example.com/yoga_video1'),
('Strength Circuit', 'Engage in a full-body workout with a series of strength exercises.', 'https://www.example.com/strength_video1'),
('HIIT Workout', 'Get your heart pumping with high-intensity interval training.', 'https://www.example.com/hiit_video1'),
('Pilates Core', 'Strengthen your core muscles with Pilates exercises.', 'https://www.example.com/pilates_video1'),
('Cardio Kickboxing', 'Combine cardio and martial arts moves for a fun workout.', 'https://www.example.com/kickboxing_video1'),
('Barre Sculpt', 'Sculpt and tone your body with a ballet-inspired workout.', 'https://www.example.com/barre_video1'),
('Circuit Training', 'Rotate through different exercises for an effective circuit workout.', 'https://www.example.com/circuit_video1'),
('Dance Fitness', 'Groove to music while burning calories and improving coordination.', 'https://www.example.com/dancefitness_video1'),
('Stretch Routine', 'Relax and improve flexibility with a guided stretching session.', 'https://www.example.com/stretch_video1');
