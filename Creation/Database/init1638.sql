CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Push-ups', 'Perform 3 sets of 10 push-ups with proper form', 'https://www.youtube.com/pushupvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Squats', 'Do 4 sets of 15 squats using bodyweight', 'https://www.youtube.com/squatvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Plank', 'Hold a plank position for 1 minute', 'https://www.youtube.com/plankvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Running', 'Jog for 30 minutes at a moderate pace', 'https://www.youtube.com/runningvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Yoga Flow', 'Follow a 20-minute yoga flow routine', 'https://www.youtube.com/yogavideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Jumping Jacks', 'Do 3 sets of 20 jumping jacks', 'https://www.youtube.com/jumpingjacksvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Abdominal Crunches', 'Perform 3 sets of 25 abdominal crunches', 'https://www.youtube.com/crunchesvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Dumbbell Curls', 'Use 5kg dumbbells and do 3 sets of 12 curls', 'https://www.youtube.com/curlsvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Bicycle Crunches', 'Alternate sides and do 4 sets of 20 bicycle crunches', 'https://www.youtube.com/bicyclecrunchesvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Stretching Routine', 'Follow a 15-minute stretching routine for flexibility', 'https://www.youtube.com/stretchingvideo1');
