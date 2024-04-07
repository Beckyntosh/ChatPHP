CREATE TABLE IF NOT EXISTS AudioFiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
transcript TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO AudioFiles (filename) VALUES ('lecture1.mp3');
INSERT INTO AudioFiles (filename) VALUES ('lecture2.mp3');
INSERT INTO AudioFiles (filename) VALUES ('lecture3.wav');
INSERT INTO AudioFiles (filename) VALUES ('lecture4.wav');
INSERT INTO AudioFiles (filename) VALUES ('lecture5.ogg');
INSERT INTO AudioFiles (filename) VALUES ('lecture6.ogg');
INSERT INTO AudioFiles (filename) VALUES ('lecture7.mp3');
INSERT INTO AudioFiles (filename) VALUES ('lecture8.mp3');
INSERT INTO AudioFiles (filename) VALUES ('lecture9.wav');
INSERT INTO AudioFiles (filename) VALUES ('lecture10.ogg');
