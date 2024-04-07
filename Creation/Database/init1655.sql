CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Parkour Training', 'Jump, climb, and roll through urban environments', 'https://www.youtube.com/watch?v=1234567890');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Yoga Flow', 'Flowing sequence of yoga poses to build strength and flexibility', 'https://www.youtube.com/watch?v=0987654321');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('HIIT Circuit', 'High-intensity interval training for cardio and calorie burn', 'https://www.youtube.com/watch?v=5432167890');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Pilates Core Workout', 'Focus on core strength and stability through controlled movements', 'https://www.youtube.com/watch?v=0987654321');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Strength Training', 'Utilize weights and resistance training to build muscle', 'https://www.youtube.com/watch?v=3498576012');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Dance Cardio', 'Get your heart rate up with fun dance routines', 'https://www.youtube.com/watch?v=5214376980');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Circuit Training', 'Mix of cardio and strength exercises for a full-body workout', 'https://www.youtube.com/watch?v=8539142760');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Stretching Routine', 'Relax and improve flexibility with a guided stretching session', 'https://www.youtube.com/watch?v=7391824560');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Meditation Practice', 'Calm your mind and reduce stress through meditation techniques', 'https://www.youtube.com/watch?v=2043815796');
INSERT INTO custom_exercises (name, instructions, video_url) VALUES ('Aerobics Workout', 'Classic aerobics moves for a fun and energizing workout', 'https://www.youtube.com/watch?v=6579381204');
