CREATE TABLE IF NOT EXISTS custom_exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(50) NOT NULL,
instructions TEXT NOT NULL,
video_url VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Push-ups', 'Instructions for performing push-ups', 'https://www.youtube.com/pushups');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Planks', 'Instructions for holding a plank position', 'https://www.youtube.com/planks');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Squats', 'Instructions for doing squats', 'https://www.youtube.com/squats');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Burpees', 'Instructions for burpees exercise', 'https://www.youtube.com/burpees');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Mountain Climbers', 'Instructions for performing mountain climbers', 'https://www.youtube.com/mountainclimbers');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Lunges', 'Instructions for lunges workout', 'https://www.youtube.com/lunges');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Jumping Jacks', 'Instructions for doing jumping jacks', 'https://www.youtube.com/jumpingjacks');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Bicycle Crunches', 'Instructions for bicycle crunches', 'https://www.youtube.com/bicyclecrunches');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Deadlifts', 'Instructions for deadlifts exercise', 'https://www.youtube.com/deadlifts');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Russian Twists', 'Instructions for russian twists workout', 'https://www.youtube.com/russiantwists');
