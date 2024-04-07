CREATE TABLE IF NOT EXISTS uploads (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
transcription TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploads (filename) VALUES ('lecture1.mp3');
INSERT INTO uploads (filename) VALUES ('lecture2.wav');
INSERT INTO uploads (filename) VALUES ('lecture3.m4a');
INSERT INTO uploads (filename) VALUES ('lecture4.mp3');
INSERT INTO uploads (filename) VALUES ('lecture5.wav');
INSERT INTO uploads (filename) VALUES ('lecture6.m4a');
INSERT INTO uploads (filename) VALUES ('lecture7.mp3');
INSERT INTO uploads (filename) VALUES ('lecture8.wav');
INSERT INTO uploads (filename) VALUES ('lecture9.m4a');
INSERT INTO uploads (filename) VALUES ('lecture10.mp3');
