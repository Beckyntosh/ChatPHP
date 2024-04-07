CREATE TABLE custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES 
('Running', 'Instructions for running exercise', 'https://www.example.com/running_video'),
('Weightlifting', 'Instructions for weightlifting exercise', 'https://www.example.com/weightlifting_video'),
('Yoga', 'Instructions for yoga exercise', 'https://www.example.com/yoga_video'),
('Swimming', 'Instructions for swimming exercise', 'https://www.example.com/swimming_video'),
('Cycling', 'Instructions for cycling exercise', 'https://www.example.com/cycling_video'),
('HIIT', 'Instructions for HIIT exercise', 'https://www.example.com/hiit_video'),
('Pilates', 'Instructions for pilates exercise', 'https://www.example.com/pilates_video'),
('Boxing', 'Instructions for boxing exercise', 'https://www.example.com/boxing_video'),
('Dance', 'Instructions for dance exercise', 'https://www.example.com/dance_video'),
('Martial Arts', 'Instructions for martial arts exercise', 'https://www.example.com/martial_arts_video');
