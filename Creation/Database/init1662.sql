CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO exercises (exercise_name, instructions, video_url) VALUES 
('Parkour Training', 'Instructions for Parkour Training', 'https://www.example.com/parkourvideo1'),
('Yoga Flow', 'Instructions for Yoga Flow', 'https://www.example.com/yogavideo1'),
('Bodyweight Workout', 'Instructions for Bodyweight Workout', 'https://www.example.com/bodyweightvideo1'),
('Pilates Routine', 'Instructions for Pilates Routine', 'https://www.example.com/pilatesvideo1'),
('HIIT Circuit', 'Instructions for HIIT Circuit', 'https://www.example.com/hiitvideo1'),
('Strength Training', 'Instructions for Strength Training', 'https://www.example.com/strengthvideo1'),
('Dance Cardio', 'Instructions for Dance Cardio', 'https://www.example.com/dancevideo1'),
('Boxing Workout', 'Instructions for Boxing Workout', 'https://www.example.com/boxingvideo1'),
('Zumba Class', 'Instructions for Zumba Class', 'https://www.example.com/zumbavideo1'),
('Aerobics Session', 'Instructions for Aerobics Session', 'https://www.example.com/aerobicsvideo1');
