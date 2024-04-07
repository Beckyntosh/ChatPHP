CREATE TABLE IF NOT EXISTS custom_exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(50) NOT NULL,
instructions TEXT NOT NULL,
video_url VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES 
('Push-ups', 'Do 3 sets of 10 repetitions', 'https://www.youtube.com/watch?v=IODxDxX7oi4'),
('Squats', 'Do 4 sets of 12 repetitions', 'https://www.youtube.com/watch?v=lHkgW3sPnRM'),
('Plank', 'Hold for 1 minute', ''),
('Jumping Jacks', 'Do 2 sets of 30 reps', 'https://www.youtube.com/watch?v=c4DAnQ6DtF8'),
('Burpees', 'Do 3 sets of 15 reps', 'https://www.youtube.com/watch?v=au8hNXP1Wak'),
('Mountain Climbers', 'Do 3 sets of 20 reps', 'https://www.youtube.com/watch?v=aMPJsdaMsCE'),
('Leg Raises', 'Do 4 sets of 10 reps', 'https://www.youtube.com/watch?v=JB2oyawG9KI'),
('High Knees', 'Do 2 sets of 1 minute each', 'https://www.youtube.com/watch?v=4I7HFDz7Rh4'),
('Dumbbell Curls', 'Do 3 sets of 12 reps', 'https://www.youtube.com/watch?v=mPM6W3pfFeU'),
('Russian Twists', 'Do 3 sets of 20 reps', 'https://www.youtube.com/watch?v=pi9swfi-55k');