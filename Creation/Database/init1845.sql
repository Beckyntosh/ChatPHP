CREATE TABLE transcriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    filesize INT NOT NULL
);

INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture1.mp3', 'audio/mp3', 5000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture2.wav', 'audio/wav', 8000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture3.mp3', 'audio/mp3', 7000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture4.wav', 'audio/wav', 6000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture5.mp3', 'audio/mp3', 9000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture6.wav', 'audio/wav', 12000000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture7.mp3', 'audio/mp3', 8500000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture8.wav', 'audio/wav', 9500000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture9.mp3', 'audio/mp3', 7500000);
INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('lecture10.wav', 'audio/wav', 11000000);
