CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    reg_date TIMESTAMP
);

INSERT INTO audio_uploads (filename) VALUES ('lecture1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture2.wav');
INSERT INTO audio_uploads (filename) VALUES ('lecture3.m4a');
INSERT INTO audio_uploads (filename) VALUES ('presentation1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('presentation2.wav');
INSERT INTO audio_uploads (filename) VALUES ('interview1.m4a');
INSERT INTO audio_uploads (filename) VALUES ('meeting1.m4a');
INSERT INTO audio_uploads (filename) VALUES ('discussion1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture4.wav');
INSERT INTO audio_uploads (filename) VALUES ('lecture5.mp3');