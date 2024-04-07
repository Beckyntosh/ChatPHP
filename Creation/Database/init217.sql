CREATE TABLE IF NOT EXISTS audios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        transcription TEXT,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO audios (file_name) VALUES ('uploads/audio1.mp3');
INSERT INTO audios (file_name) VALUES ('uploads/audio2.wav');
INSERT INTO audios (file_name) VALUES ('uploads/audio3.ogg');
INSERT INTO audios (file_name) VALUES ('uploads/audio4.mp3');
INSERT INTO audios (file_name) VALUES ('uploads/audio5.wav');
INSERT INTO audios (file_name) VALUES ('uploads/audio6.ogg');
INSERT INTO audios (file_name) VALUES ('uploads/audio7.mp3');
INSERT INTO audios (file_name) VALUES ('uploads/audio8.wav');
INSERT INTO audios (file_name) VALUES ('uploads/audio9.ogg');
INSERT INTO audios (file_name) VALUES ('uploads/audio10.mp3');