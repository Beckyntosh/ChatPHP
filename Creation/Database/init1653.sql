CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES 
('Parkour Training', 'Practice jumping, climbing, and rolling techniques', 'https://www.example.com/parkour_video'),
('Yoga Poses', 'Learn different yoga poses and their benefits', 'https://www.example.com/yoga_video'),
('HIIT Workout', 'High-intensity interval training session for full-body workout', 'https://www.example.com/hiit_video'),
('CrossFit WOD', 'Complete a CrossFit Workout of the Day', 'https://www.example.com/crossfit_video'),
('Pilates Routine', 'Engage core muscles and improve flexibility', 'https://www.example.com/pilates_video'),
('Strength Training', 'Work on building muscle strength with weights', 'https://www.example.com/strength_video'),
('Cardio Dance', 'Enjoy a fun dance workout for cardiovascular health', 'https://www.example.com/dance_video'),
('Calisthenics Workout', 'Bodyweight exercises for strength and agility', 'https://www.example.com/calisthenics_video'),
('Stretching Exercises', 'Improve flexibility and prevent injuries with stretching', 'https://www.example.com/stretching_video'),
('Swimming Drills', 'Practice different swimming techniques for improvement', 'https://www.example.com/swimming_video');