CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(30) NOT NULL,
    filepath VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO uploads (filename, filepath) VALUES 
('lecture1.mp3', 'uploads/lecture1.mp3'),
('lecture2.mp3', 'uploads/lecture2.mp3'),
('interview1.wav', 'uploads/interview1.wav'),
('speech1.mp3', 'uploads/speech1.mp3'),
('session1.wav', 'uploads/session1.wav'),
('meeting1.mp3', 'uploads/meeting1.mp3'),
('lecture3.wav', 'uploads/lecture3.wav'),
('speech2.mp3', 'uploads/speech2.mp3'),
('conversation1.wav', 'uploads/conversation1.wav'),
('lecture4.mp3', 'uploads/lecture4.mp3');