CREATE TABLE IF NOT EXISTS audio_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(50),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO audio_uploads (filename) VALUES ('lecture1.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture2.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture3.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture4.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture5.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture6.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture7.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture8.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture9.mp3');
INSERT INTO audio_uploads (filename) VALUES ('lecture10.mp3');
