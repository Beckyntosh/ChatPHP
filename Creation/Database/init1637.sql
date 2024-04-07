CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video_url) 
VALUES ('Parkour Training', 'Instructions for Parkour Training', 'https://www.example.com/parkourvideo1'),
       ('Yoga Flow', 'Instructions for Yoga Flow', 'https://www.example.com/yogavideo1'),
       ('HIIT Workout', 'Instructions for HIIT Workout', 'https://www.example.com/hiitvideo1'),
       ('Pilates Core Exercises', 'Instructions for Pilates Core Exercises', 'https://www.example.com/pilatesvideo1'),
       ('Strength Training Circuit', 'Instructions for Strength Training Circuit', 'https://www.example.com/strengthvideo1'),
       ('Zumba Dance Routine', 'Instructions for Zumba Dance Routine', 'https://www.example.com/zumbavideo1'),
       ('Cycling Interval Training', 'Instructions for Cycling Interval Training', 'https://www.example.com/cyclingvideo1'),
       ('Swimming Drills', 'Instructions for Swimming Drills', 'https://www.example.com/swimmingvideo1'),
       ('Martial Arts Techniques', 'Instructions for Martial Arts Techniques', 'https://www.example.com/martialartsvideo1'),
       ('Mindfulness Meditation', 'Instructions for Mindfulness Meditation', 'https://www.example.com/meditationvideo1');
