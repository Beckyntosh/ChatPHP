CREATE TABLE IF NOT EXISTS audio_transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio1.mp3');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio2.wav');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio3.mp3');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio4.wav');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio5.mp3');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio6.wav');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio7.mp3');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio8.wav');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio9.mp3');
INSERT INTO audio_transcriptions (file_path) VALUES ('uploads/audio10.wav');