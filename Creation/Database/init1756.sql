CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(100) NOT NULL,
    filesize INT(10) UNSIGNED,
    content LONGBLOB NOT NULL,
    upload_time TIMESTAMP
);

INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc1.jpg', 'image/jpeg', 1024, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc2.pdf', 'application/pdf', 2048, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc3.png', 'image/png', 3072, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc4.jpg', 'image/jpeg', 4096, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc5.pdf', 'application/pdf', 5120, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc6.png', 'image/png', 6144, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc7.jpg', 'image/jpeg', 7168, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc8.pdf', 'application/pdf', 8192, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc9.png', 'image/png', 9216, 'binary_content_here');
INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('doc10.jpg', 'image/jpeg', 10240, 'binary_content_here');
