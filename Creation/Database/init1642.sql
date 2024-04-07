CREATE TABLE custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255)
);
INSERT INTO custom_exercises (name, instructions, video_url) VALUES 
('Parkour Training', 'Jump, climb, and roll', 'https://www.youtube.com/parkour'),
('Yoga Flow', 'Relax and stretch', 'https://www.youtube.com/yoga'),
('Weightlifting Basics', 'Build strength and muscle', 'https://www.youtube.com/weightlifting'),
('Cardio Blast', 'Get your heart rate up', 'https://www.youtube.com/cardio'),
('Pilates Core Workout', 'Strengthen your core', 'https://www.youtube.com/pilates'),
('Tabata Circuit', 'High-intensity interval training', 'https://www.youtube.com/tabata'),
('HIIT Challenge', 'Full body workout', 'https://www.youtube.com/hiit'),
('Dance Party', 'Fun and energetic movements', 'https://www.youtube.com/dance'),
('Bodyweight Burn', 'No equipment needed', 'https://www.youtube.com/bodyweight'),
('Meditation Time', 'Relax and destress', 'https://www.youtube.com/meditation');
