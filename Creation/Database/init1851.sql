CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcribed_text LONGTEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_uploads (filename) VALUES ('lecture1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture2.wav');
INSERT INTO audio_uploads (filename) VALUES ('lecture3.ogg');
INSERT INTO audio_uploads (filename) VALUES ('interview1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('conference1.wav');
INSERT INTO audio_uploads (filename) VALUES ('meeting1.ogg');
INSERT INTO audio_uploads (filename) VALUES ('presentation1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('seminar1.wav');
INSERT INTO audio_uploads (filename) VALUES ('workshop1.ogg');
INSERT INTO audio_uploads (filename) VALUES ('speech1.mp3');