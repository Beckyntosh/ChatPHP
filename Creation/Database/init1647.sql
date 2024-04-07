CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (exercise_name, instructions, video)
VALUES ('Parkour Training', 'Instructions for Parkour Training', 'parkour_video.mp4'),
       ('Yoga Session', 'Instructions for Yoga Session', 'yoga_video.mp4'),
       ('HIIT Workout', 'Instructions for HIIT Workout', 'hiit_video.mp4'),
       ('Weightlifting Routine', 'Instructions for Weightlifting Routine', 'weightlifting_video.mp4'),
       ('Pilates Practice', 'Instructions for Pilates Practice', 'pilates_video.mp4'),
       ('Cardio Dance', 'Instructions for Cardio Dance', 'cardio_dance_video.mp4'),
       ('Bodyweight Exercises', 'Instructions for Bodyweight Exercises', 'bodyweight_exercises_video.mp4'),
       ('Circuit Training', 'Instructions for Circuit Training', 'circuit_training_video.mp4'),
       ('Flexibility Stretching', 'Instructions for Flexibility Stretching', 'flexibility_stretching_video.mp4'),
       ('Meditation Session', 'Instructions for Meditation Session', 'meditation_video.mp4');
