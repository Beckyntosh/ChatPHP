CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exerciseName VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    videoURL VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Push-ups', 'Instructions for push-ups', 'https://www.youtube.com/pushups');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Squats', 'Instructions for squats', 'https://www.youtube.com/squats');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Plank', 'Instructions for plank', 'https://www.youtube.com/plank');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Sit-ups', 'Instructions for sit-ups', 'https://www.youtube.com/situps');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Lunges', 'Instructions for lunges', 'https://www.youtube.com/lunges');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Bicep Curls', 'Instructions for bicep curls', 'https://www.youtube.com/bicepcurls');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Running', 'Instructions for running', 'https://www.youtube.com/running');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Burpees', 'Instructions for burpees', 'https://www.youtube.com/burpees');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Jumping Jacks', 'Instructions for jumping jacks', 'https://www.youtube.com/jumpingjacks');
INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES ('Mountain Climbers', 'Instructions for mountain climbers', 'https://www.youtube.com/mountainclimbers');
