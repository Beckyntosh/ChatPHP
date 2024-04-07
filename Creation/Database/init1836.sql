CREATE TABLE IF NOT EXISTS audio_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
file_path VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_uploads (filename, file_path) VALUES ('lecture1.mp3', 'uploads/lecture1.mp3');
INSERT INTO audio_uploads (filename, file_path) VALUES ('lecture2.wav', 'uploads/lecture2.wav');
INSERT INTO audio_uploads (filename, file_path) VALUES ('lecture3.m4a', 'uploads/lecture3.m4a');
INSERT INTO audio_uploads (filename, file_path) VALUES ('presentation1.mp3', 'uploads/presentation1.mp3');
INSERT INTO audio_uploads (filename, file_path) VALUES ('presentation2.wav', 'uploads/presentation2.wav');
INSERT INTO audio_uploads (filename, file_path) VALUES ('interview1.m4a', 'uploads/interview1.m4a');
INSERT INTO audio_uploads (filename, file_path) VALUES ('discussion1.mp3', 'uploads/discussion1.mp3');
INSERT INTO audio_uploads (filename, file_path) VALUES ('speech1.wav', 'uploads/speech1.wav');
INSERT INTO audio_uploads (filename, file_path) VALUES ('lecture4.mp3', 'uploads/lecture4.mp3');
INSERT INTO audio_uploads (filename, file_path) VALUES ('presentation3.wav', 'uploads/presentation3.wav');
