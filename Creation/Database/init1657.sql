CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Parkour Training', 'Jump, climb, and roll in an urban environment', 'https://www.example.com/parkour_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Yoga Flow', 'Flow through various yoga poses for flexibility and strength', 'https://www.example.com/yoga_flow_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('HIIT Workout', 'High-intensity interval training for a quick and effective workout', 'https://www.example.com/hiit_workout_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Strength Training', 'Focus on building muscle and strength with weights', 'https://www.example.com/strength_training_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Pilates Routine', 'Strengthen your core and improve flexibility with Pilates', 'https://www.example.com/pilates_routine_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Cycling Workout', 'Get your heart rate up with a cycling workout', 'https://www.example.com/cycling_workout_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Dance Cardio', 'Move and groove to energetic music for a cardio workout', 'https://www.example.com/dance_cardio_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Mindful Meditation', 'Practice mindfulness and deep breathing for stress relief', 'https://www.example.com/meditation_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Bootcamp Circuit', 'Challenge yourself with a total body bootcamp circuit', 'https://www.example.com/bootcamp_circuit_video1');
INSERT INTO custom_exercises (title, instructions, video_url) VALUES ('Swimming Drills', 'Improve your swimming technique with targeted drills', 'https://www.example.com/swimming_drills_video1');
