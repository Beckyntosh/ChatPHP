CREATE TABLE IF NOT EXISTS audio_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    reg_date TIMESTAMP
);

INSERT INTO audio_files (filename) VALUES ('lecture1.mp3');
INSERT INTO audio_files (filename) VALUES ('lecture2.wav');
INSERT INTO audio_files (filename) VALUES ('lecture3.ogg');
INSERT INTO audio_files (filename) VALUES ('lecture4.mp3');
INSERT INTO audio_files (filename) VALUES ('lecture5.wav');
INSERT INTO audio_files (filename) VALUES ('lecture6.ogg');
INSERT INTO audio_files (filename) VALUES ('lecture7.mp3');
INSERT INTO audio_files (filename) VALUES ('lecture8.wav');
INSERT INTO audio_files (filename) VALUES ('lecture9.ogg');
INSERT INTO audio_files (filename) VALUES ('lecture10.mp3');
