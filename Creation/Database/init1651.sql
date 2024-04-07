CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Push-ups', 'Instructions for doing push-ups', 'https://www.example.com/pushups');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Yoga Poses', 'Instructions for various yoga poses', 'https://www.example.com/yogaposes');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Jumping Jacks', 'Instructions for performing jumping jacks', 'https://www.example.com/jumpingjacks');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Planks', 'Instructions for holding a plank position', 'https://www.example.com/planks');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Squats', 'Instructions for proper squat technique', 'https://www.example.com/squats');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Mountain Climbers', 'Instructions for mountain climber exercise', 'https://www.example.com/mountainclimbers');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Burpees', 'Instructions for performing burpees', 'https://www.example.com/burpees');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Lunges', 'Instructions for doing lunges', 'https://www.example.com/lunges');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Bicycle Crunches', 'Instructions for bicycle crunch exercise', 'https://www.example.com/bicyclecrunches');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Russian Twists', 'Instructions for Russian twist exercise', 'https://www.example.com/russiantwists');
