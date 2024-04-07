CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_path VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Push-ups', 'Instructions for push-ups', 'uploads/pushups.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Squats', 'Instructions for squats', 'uploads/squats.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Plank', 'Instructions for plank', 'uploads/plank.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Jumping Jacks', 'Instructions for jumping jacks', 'uploads/jumpingjacks.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Mountain Climbers', 'Instructions for mountain climbers', 'uploads/mountainclimbers.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Bicep Curls', 'Instructions for bicep curls', 'uploads/bicepcurls.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Lunges', 'Instructions for lunges', 'uploads/lunges.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Burpees', 'Instructions for burpees', 'uploads/burpees.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('High Knees', 'Instructions for high knees', 'uploads/highknees.mp4');
INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES ('Deadlifts', 'Instructions for deadlifts', 'uploads/deadlifts.mp4');
