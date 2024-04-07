CREATE TABLE IF NOT EXISTS CustomExercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exerciseName VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    videoLink VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO CustomExercises (exerciseName, instructions, videoLink) VALUES 
('Push-ups', 'Instructions for doing push-ups...', 'https://www.example.com/pushups'),
('Yoga', 'Instructions for doing Yoga...', 'https://www.example.com/yoga'),
('Plank', 'Instructions for doing Plank...', 'https://www.example.com/plank'),
('Squats', 'Instructions for doing Squats...', 'https://www.example.com/squats'),
('Cycling', 'Instructions for cycling...', 'https://www.example.com/cycling'),
('Jumping Jacks', 'Instructions for doing Jumping Jacks...', 'https://www.example.com/jumpingjacks'),
('Dumbbell Curls', 'Instructions for dumbbell curls...', 'https://www.example.com/dumbbellcurls'),
('Running', 'Instructions for running...', 'https://www.example.com/running'),
('Swimming', 'Instructions for swimming...', 'https://www.example.com/swimming'),
('Dance Workout', 'Instructions for dance workout...', 'https://www.example.com/danceworkout');
