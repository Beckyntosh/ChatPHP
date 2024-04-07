CREATE TABLE IF NOT EXISTS transcriptions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filetype VARCHAR(100) NOT NULL,
filesize INT(10) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture1.mp3', 'audio/mpeg', 5000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture2.wav', 'audio/wav', 4500000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture3.mp3', 'audio/mpeg', 4800000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture4.wav', 'audio/wav', 5200000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture5.mp3', 'audio/mpeg', 4900000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture6.wav', 'audio/wav', 4700000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture7.mp3', 'audio/mpeg', 5100000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture8.wav', 'audio/wav', 4800000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture9.mp3', 'audio/mpeg', 4700000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture10.wav', 'audio/wav', 5200000);