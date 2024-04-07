CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO audio_uploads (file_name) VALUES ("lecture1.mp3");
INSERT INTO audio_uploads (file_name) VALUES ("lecture2.mp3");
INSERT INTO audio_uploads (file_name) VALUES ("lecture3.wav");
INSERT INTO audio_uploads (file_name) VALUES ("lecture4.wav");
INSERT INTO audio_uploads (file_name) VALUES ("lecture5.mp3");
INSERT INTO audio_uploads (file_name) VALUES ("lecture6.wav");
INSERT INTO audio_uploads (file_name) VALUES ("lecture7.wav");
INSERT INTO audio_uploads (file_name) VALUES ("lecture8.mp3");
INSERT INTO audio_uploads (file_name) VALUES ("lecture9.mp3");
INSERT INTO audio_uploads (file_name) VALUES ("lecture10.wav");
