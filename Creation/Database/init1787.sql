CREATE TABLE IF NOT EXISTS audio_transcriptions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
transcription TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example1.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example2.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example3.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example4.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example5.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example6.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example7.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example8.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example9.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('uploads/example10.wav');
