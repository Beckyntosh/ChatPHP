CREATE TABLE IF NOT EXISTS audio_transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/lecture1.mp3', 'Transcription 1');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/lecture2.wav', 'Transcription 2');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/lecture3.ogg', 'Transcription 3');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/lecture4.mp3', 'Transcription 4');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/lecture5.wav', 'Transcription 5');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/file6.mp3', 'Transcription 6');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/file7.wav', 'Transcription 7');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/file8.ogg', 'Transcription 8');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/file9.wav', 'Transcription 9');
INSERT INTO audio_transcriptions (filename, transcription) VALUES ('uploads/file10.mp3', 'Transcription 10');
