CREATE TABLE IF NOT EXISTS exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
video_url VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO exercises (name, description, video_url) VALUES 
('Running', 'Cardio exercise that involves moving at a fast pace', 'https://www.youtube.com/watch?v=oK67OR2vAJE'),
('Yoga', 'Mind-body practice that combines physical postures, breathing techniques, and meditation or relaxation', 'https://www.youtube.com/watch?v=oGJHmWAFz0g'),
('Weightlifting', 'Strength training exercise that involves lifting weights to build muscle', 'https://www.youtube.com/watch?v=mU2k9i-2g94'),
('Swimming', 'Full-body workout that can improve cardiovascular health and muscle strength', 'https://www.youtube.com/watch?v=lebaH0C-LQ0'),
('Cycling', 'Low-impact aerobic exercise that can improve leg strength and cardiovascular fitness', 'https://www.youtube.com/watch?v=sbiQLJwn0xI'),
('Pilates', 'Body conditioning routine that helps build flexibility, muscle strength, and endurance', 'https://www.youtube.com/watch?v=_LkZuBRwFag'),
('Dancing', "Fun and lively way to stay active and improve coordination and cardiovascular fitness", 'https://www.youtube.com/watch?v=QsZ29nIYdWY'),
('HIIT', 'High-intensity interval training involving short bursts of intense exercise followed by brief rest periods', 'https://www.youtube.com/watch?v=yCYxzpHiLiw'),
('Boxing', 'Full-body workout that improves strength, speed, and agility', 'https://www.youtube.com/watch?v=2mcuImwSWl4'),
('Calisthenics', 'Bodyweight exercises that improve strength, flexibility, and balance', 'https://www.youtube.com/watch?v=U4sW7un2zLE');
