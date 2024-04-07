CREATE TABLE IF NOT EXISTS animation_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    feedback TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO animation_files (filename, feedback) VALUES ('Scene 1 Animations.zip', 'Great work!'),
('Scene 2 Animations.rar', 'Needs improvement'),
('Scene 3 Animations.7z', 'Impressive work'),
('Scene 4 Animations.zip', 'Good effort'),
('Scene 5 Animations.rar', 'Excellent job'),
('Scene 6 Animations.7z', 'Very creative'),
('Scene 7 Animations.zip', 'Well done'),
('Scene 8 Animations.rar', 'Amazing work'),
('Scene 9 Animations.7z', 'Fantastic animation'),
('Scene 10 Animations.zip', 'Outstanding work');
