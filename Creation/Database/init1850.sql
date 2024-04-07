CREATE TABLE IF NOT EXISTS audio_transcriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  transcription LONGTEXT,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values into the table
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture1.mp3');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture2.wav');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture3.m4a');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture4.mp3');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture5.wav');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture6.m4a');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture7.mp3');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture8.wav');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture9.m4a');
INSERT INTO audio_transcriptions (file_name) VALUES ('lecture10.mp3');
