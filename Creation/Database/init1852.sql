CREATE TABLE IF NOT EXISTS AudioTranscriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT DEFAULT NULL,
    uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO AudioTranscriptions (filename) VALUES ('lecture1.mp3');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture2.wav');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture3.ogg');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture4.mp3');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture5.wav');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture6.ogg');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture7.mp3');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture8.wav');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture9.ogg');
INSERT INTO AudioTranscriptions (filename) VALUES ('lecture10.mp3');