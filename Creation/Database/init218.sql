CREATE TABLE IF NOT EXISTS transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(50) NOT NULL,
    transcription TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO transcriptions (filename, transcription) VALUES ('audio1.mp3', 'This is the transcription for audio1.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio2.mp3', 'This is the transcription for audio2.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio3.mp3', 'This is the transcription for audio3.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio4.mp3', 'This is the transcription for audio4.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio5.mp3', 'This is the transcription for audio5.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio6.mp3', 'This is the transcription for audio6.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio7.mp3', 'This is the transcription for audio7.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio8.mp3', 'This is the transcription for audio8.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio9.mp3', 'This is the transcription for audio9.mp3');
INSERT INTO transcriptions (filename, transcription) VALUES ('audio10.mp3', 'This is the transcription for audio10.mp3');
