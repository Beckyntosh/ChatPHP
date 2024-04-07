CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES
('Parkour Training', 'Instructions for Parkour Training', 'https://www.example.com/parkour_video'),
('Yoga Routine', 'Instructions for Yoga Routine', 'https://www.example.com/yoga_video'),
('Cardio Dance Workout', 'Instructions for Cardio Dance Workout', 'https://www.example.com/cardio_video'),
('Strength Training Circuit', 'Instructions for Strength Training Circuit', 'https://www.example.com/strength_video'),
('Pilates Core Exercises', 'Instructions for Pilates Core Exercises', 'https://www.example.com/pilates_video'),
('HIIT Workout', 'Instructions for HIIT Workout', 'https://www.example.com/hiit_video'),
('CrossFit WOD', 'Instructions for CrossFit WOD', 'https://www.example.com/crossfit_video'),
('Calisthenics Routine', 'Instructions for Calisthenics Routine', 'https://www.example.com/calisthenics_video'),
('Bootcamp Challenge', 'Instructions for Bootcamp Challenge', 'https://www.example.com/bootcamp_video'),
('Zumba Dance Party', 'Instructions for Zumba Dance Party', 'https://www.example.com/zumba_video');
