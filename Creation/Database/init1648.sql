CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Parkour Training', 'Jump and climb obstacles with precision', 'https://www.example.com/parkourvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Yoga Flow', 'Practice a series of yoga poses to improve flexibility', 'https://www.example.com/yogavideo1');
INSERT INTO custom_exercises (exercise_name, instructions) VALUES ('HIIT Workout', 'High-intensity interval training for cardio and strength', 'https://www.example.com/hiitvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Core Strengthening', 'Target the abdominal muscles for a strong core', 'https://www.example.com/corevideo1');
INSERT INTO custom_exercises (exercise_name, instructions) VALUES ('Pilates Routine', 'Engage in controlled movements for strength and flexibility', 'https://www.example.com/pilatesvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Resistance Band Training', 'Use resistance bands for a full-body workout', 'https://www.example.com/resistancevideo1');
INSERT INTO custom_exercises (exercise_name, instructions) VALUES ('Kickboxing Drills', 'Punch and kick your way to fitness with kickboxing drills', 'https://www.example.com/kickboxingvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Dance Cardio', 'Get your heart rate up with fun dance routines', 'https://www.example.com/dancevideo1');
INSERT INTO custom_exercises (exercise_name, instructions) VALUES ('Strength Circuit', 'Alternate between strength exercises for endurance', 'https://www.example.com/strengthvideo1');
INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES ('Mindfulness Meditation', 'Practice mindfulness and relaxation techniques', 'https://www.example.com/meditationvideo1');
