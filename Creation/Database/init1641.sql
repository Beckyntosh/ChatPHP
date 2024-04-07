CREATE TABLE IF NOT EXISTS CustomExercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exerciseName VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    videoURL VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO CustomExercises (exerciseName, instructions, videoURL) VALUES 
('Parkour Training', 'Practice parkour moves such as vaults, jumps, and rolls in a safe environment', 'https://www.example.com/parkourvideo1'),
('Yoga Poses', 'Learn and practice various yoga poses to improve flexibility and strength', 'https://www.example.com/yogavideo1'),
('Circuit Training', 'Combine different exercises like push-ups, squats, and burpees in a high-intensity workout', 'https://www.example.com/circuitvideo1'),
('HIIT Workout', 'Perform high-intensity interval training with short bursts of intense exercise followed by rest periods', 'https://www.example.com/hiitvideo1'),
('Pilates Core Exercises', 'Strengthen your core muscles by engaging in Pilates exercises focused on stability and control', 'https://www.example.com/pilatesvideo1'),
('Boxing Drills', 'Improve your boxing skills with drills that focus on footwork, punching technique, and defense', 'https://www.example.com/boxingvideo1'),
('Dance Cardio', 'Enjoy a fun and energetic workout by following dance routines that elevate your heart rate', 'https://www.example.com/dancevideo1'),
('Strength Training', 'Build muscle and increase strength by lifting weights or using resistance bands in various exercises', 'https://www.example.com/strengthvideo1'),
('Flexibility Stretches', 'Increase flexibility and prevent injury by stretching major muscle groups for improved range of motion', 'https://www.example.com/flexibilityvideo1'),
('Meditation Practice', 'Relax your mind and body with meditation techniques that promote mindfulness and stress relief', 'https://www.example.com/meditationvideo1');
