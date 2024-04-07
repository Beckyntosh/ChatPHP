CREATE TABLE exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255)
);
INSERT INTO exercises (exercise_name, instructions, video_url) VALUES 
('Push-ups', 'Instructions for doing push-ups', 'https://www.example.com/pushupvideo'),
('Squats', 'Instructions for doing squats', 'https://www.example.com/squatvideo'),
('Burpees', 'Instructions for doing burpees', 'https://www.example.com/burpeevideo'),
('Plank', 'Instructions for doing plank', 'https://www.example.com/plankvideo'),
('Running', 'Instructions for running', 'https://www.example.com/runningvideo'),
('Jumping Jacks', 'Instructions for doing jumping jacks', 'https://www.example.com/jumpingjacksvideo'),
('Yoga', 'Instructions for yoga poses', 'https://www.example.com/yogavideo'),
('Cycling', 'Instructions for cycling', 'https://www.example.com/cyclingvideo'),
('Swimming', 'Instructions for swimming techniques', 'https://www.example.com/swimmingvideo'),
('High Knees', 'Instructions for doing high knees', 'https://www.example.com/highkneesvideo');
