CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (title, instructions, video_url) VALUES 
('Push-ups', 'Do 3 sets of 15 push-ups each', 'https://www.youtube.com/pushups'),
('Squats', 'Do 4 sets of 20 squats each', 'https://www.youtube.com/squats'),
('Plank', 'Hold the plank position for 1 minute each set', 'https://www.youtube.com/plank'),
('Jumping Jacks', 'Do 3 sets of 30 jumping jacks each', 'https://www.youtube.com/jumpingjacks'),
('Burpees', 'Do 3 sets of 10 burpees each', 'https://www.youtube.com/burpees'),
('Lunges', 'Do 3 sets of 12 lunges each leg', 'https://www.youtube.com/lunges'),
('Mountain Climbers', 'Do 4 sets of 20 mountain climbers each', 'https://www.youtube.com/mountainclimbers'),
('Dumbbell Rows', 'Do 3 sets of 12 dumbbell rows each arm', 'https://www.youtube.com/dumbbellrows'),
('Bicycle Crunches', 'Do 3 sets of 20 bicycle crunches each side', 'https://www.youtube.com/bicyclecrunches'),
('Russian Twists', 'Do 4 sets of 15 Russian twists each side', 'https://www.youtube.com/russiantwists');
