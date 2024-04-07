CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(512) NOT NULL
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES 
('Push-ups', 'Instructions for push-ups', 'https://www.example.com/pushups-video'),
('Squats', 'Instructions for squats', 'https://www.example.com/squats-video'),
('Plank', 'Instructions for plank', 'https://www.example.com/plank-video'),
('Jumping Jacks', 'Instructions for jumping jacks', 'https://www.example.com/jumpingjacks-video'),
('Burpees', 'Instructions for burpees', 'https://www.example.com/burpees-video'),
('Lunges', 'Instructions for lunges', 'https://www.example.com/lunges-video'),
('Mountain Climbers', 'Instructions for mountain climbers', 'https://www.example.com/mountainclimbers-video'),
('Dumbbell Rows', 'Instructions for dumbbell rows', 'https://www.example.com/dumbbellrows-video'),
('Bicep Curls', 'Instructions for bicep curls', 'https://www.example.com/bicepcurls-video'),
('Deadlifts', 'Instructions for deadlifts', 'https://www.example.com/deadlifts-video');
