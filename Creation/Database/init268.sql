CREATE TABLE attachments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    size INT NOT NULL,
    content LONGBLOB NOT NULL
);

INSERT INTO attachments (name, type, size, content) VALUES ('image1.jpg', 'image/jpeg', 1024, 'binarycontent1');
INSERT INTO attachments (name, type, size, content) VALUES ('image2.png', 'image/png', 2048, 'binarycontent2');
INSERT INTO attachments (name, type, size, content) VALUES ('document1.pdf', 'application/pdf', 4096, 'binarycontent3');
INSERT INTO attachments (name, type, size, content) VALUES ('spreadsheet1.xls', 'application/vnd.ms-excel', 8192, 'binarycontent4');
INSERT INTO attachments (name, type, size, content) VALUES ('zipfile1.zip', 'application/zip', 16384, 'binarycontent5');
INSERT INTO attachments (name, type, size, content) VALUES ('textfile1.txt', 'text/plain', 32768, 'binarycontent6');
INSERT INTO attachments (name, type, size, content) VALUES ('image3.gif', 'image/gif', 65536, 'binarycontent7');
INSERT INTO attachments (name, type, size, content) VALUES ('document2.pdf', 'application/pdf', 131072, 'binarycontent8');
INSERT INTO attachments (name, type, size, content) VALUES ('spreadsheet2.xls', 'application/vnd.ms-excel', 262144, 'binarycontent9');
INSERT INTO attachments (name, type, size, content) VALUES ('textfile2.txt', 'text/plain', 524288, 'binarycontent10');
