CREATE TABLE IF NOT EXISTS audio_transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_date TIMESTAMP
);

INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture1.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture2.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture3.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture4.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture5.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture6.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture7.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture8.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture9.mp3', NOW());
INSERT INTO audio_transcriptions (file_name, upload_date) VALUES ('lecture10.mp3', NOW());
