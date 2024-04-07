CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filetype VARCHAR(50) NOT NULL,
filesize INT NOT NULL,
uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document1.pdf', 'application/pdf', 1024);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document2.jpg', 'image/jpeg', 2048);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document3.png', 'image/png', 3072);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document4.jpg', 'image/jpeg', 4096);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document5.pdf', 'application/pdf', 5120);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document6.png', 'image/png', 6144);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document7.jpg', 'image/jpeg', 7168);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document8.jpg', 'image/jpeg', 8192);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document9.png', 'image/png', 9216);
INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('document10.pdf', 'application/pdf', 10240);
