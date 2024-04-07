CREATE TABLE IF NOT EXISTS custom_exercises (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  instructions TEXT NOT NULL,
  video_url VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Parkour Training', 'Jump, climb, and move efficiently in urban environments', 'https://www.example.com/parkour_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Yoga Flow', 'Flow through poses to improve flexibility and strength', 'https://www.example.com/yoga_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('HIIT Workout', 'High-intensity interval training for cardio and calorie burn', 'https://www.example.com/hiit_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Pilates Core Exercises', 'Strengthen and tone core muscles with controlled movements', 'https://www.example.com/pilates_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Boxing Basics', 'Learn punching and footwork techniques for boxing training', 'https://www.example.com/boxing_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Bodyweight Circuit', 'Full-body workout using only bodyweight exercises', 'https://www.example.com/bodyweight_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Resistance Band Training', 'Use resistance bands for strength and mobility exercises', 'https://www.example.com/resistance_band_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Dance Workout', 'Have fun and stay active with dance-based exercises', 'https://www.example.com/dance_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Swimming Drills', 'Improve swim strokes and endurance with focused drills', 'https://www.example.com/swimming_video1');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Balance and Stability Exercises', 'Enhance balance and stability with targeted exercises', 'https://www.example.com/balance_video1');
