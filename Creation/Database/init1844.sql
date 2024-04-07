CREATE TABLE uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(255) NOT NULL,
    filesize INT NOT NULL
);

INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture1.wav', 'audio/wav', 10240);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture2.mp3', 'audio/mpeg', 8192);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture3.wav', 'audio/wav', 5120);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture4.m4a', 'audio/m4a', 7168);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture5.wav', 'audio/wav', 9216);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture6.mp3', 'audio/mpeg', 6144);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture7.wav', 'audio/wav', 10240);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture8.m4a', 'audio/m4a', 4096);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture9.wav', 'audio/wav', 8192);
INSERT INTO uploads (filename, filetype, filesize) VALUES ('lecture10.mp3', 'audio/mpeg', 6144);
