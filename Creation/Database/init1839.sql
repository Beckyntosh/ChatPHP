CREATE TABLE transcriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL
);

INSERT INTO transcriptions (filename, path) VALUES ('lecture1.mp3', 'uploads/lecture1.mp3');
INSERT INTO transcriptions (filename, path) VALUES ('lecture2.wav', 'uploads/lecture2.wav');
INSERT INTO transcriptions (filename, path) VALUES ('lecture3.ogg', 'uploads/lecture3.ogg');
INSERT INTO transcriptions (filename, path) VALUES ('lecture4.mp3', 'uploads/lecture4.mp3');
INSERT INTO transcriptions (filename, path) VALUES ('lecture5.wav', 'uploads/lecture5.wav');
INSERT INTO transcriptions (filename, path) VALUES ('lecture6.ogg', 'uploads/lecture6.ogg');
INSERT INTO transcriptions (filename, path) VALUES ('lecture7.mp3', 'uploads/lecture7.mp3');
INSERT INTO transcriptions (filename, path) VALUES ('lecture8.wav', 'uploads/lecture8.wav');
INSERT INTO transcriptions (filename, path) VALUES ('lecture9.ogg', 'uploads/lecture9.ogg');
INSERT INTO transcriptions (filename, path) VALUES ('lecture10.mp3', 'uploads/lecture10.mp3');
