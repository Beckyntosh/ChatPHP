CREATE TABLE IF NOT EXISTS audio_transcriptions (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(255) NOT NULL,
transcription TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_transcriptions (filename) VALUES ('lecture1.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture2.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture3.ogg');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture4.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture5.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture6.ogg');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture7.mp3');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture8.wav');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture9.ogg');
INSERT INTO audio_transcriptions (filename) VALUES ('lecture10.mp3');
