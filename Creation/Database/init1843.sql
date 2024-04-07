CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    original_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values into audio_uploads table
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture1.mp3', 'uploads/lecture1.mp3');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture2.wav', 'uploads/lecture2.wav');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture3.m4a', 'uploads/lecture3.m4a');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('presentation1.mp3', 'uploads/presentation1.mp3');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('tutorial1.wav', 'uploads/tutorial1.wav');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('interview1.m4a', 'uploads/interview1.m4a');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('seminar1.mp3', 'uploads/seminar1.mp3');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('discussion1.wav', 'uploads/discussion1.wav');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('conference1.m4a', 'uploads/conference1.m4a');
INSERT INTO audio_uploads (original_name, file_path) VALUES ('lecture4.mp3', 'uploads/lecture4.mp3');
