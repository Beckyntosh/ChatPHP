CREATE TABLE documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    filesize INT(30) NOT NULL
);

INSERT INTO documents (filename, filetype, filesize) VALUES ('license1.jpg', 'image/jpg', 1024);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license2.png', 'image/png', 2048);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license3.jpeg', 'image/jpeg', 3072);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license4.gif', 'image/gif', 4096);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license5.jpg', 'image/jpg', 5120);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license6.png', 'image/png', 6144);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license7.jpeg', 'image/jpeg', 7168);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license8.gif', 'image/gif', 8192);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license9.jpg', 'image/jpg', 9216);
INSERT INTO documents (filename, filetype, filesize) VALUES ('license10.png', 'image/png', 10240);
