CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_uploads (filename) VALUES ('audio1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('audio2.wav');
INSERT INTO audio_uploads (filename) VALUES ('audio3.mp3');
INSERT INTO audio_uploads (filename) VALUES ('audio4.wav');
INSERT INTO audio_uploads (filename) VALUES ('audio5.mp3');
INSERT INTO audio_uploads (filename) VALUES ('audio6.wav');
INSERT INTO audio_uploads (filename) VALUES ('audio7.mp3');
INSERT INTO audio_uploads (filename) VALUES ('audio8.wav');
INSERT INTO audio_uploads (filename) VALUES ('audio9.mp3');
INSERT INTO audio_uploads (filename) VALUES ('audio10.wav');
