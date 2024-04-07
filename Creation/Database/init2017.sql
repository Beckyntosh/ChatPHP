CREATE TABLE IF NOT EXISTS vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    mimetype VARCHAR(50),
    filesize INT(10),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('logo1.svg', 'image/svg+xml', 1024);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('logo2.ai', 'application/postscript', 2048);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('design1.eps', 'application/postscript', 4096);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('design2.svg', 'image/svg+xml', 8192);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('logo3.eps', 'application/postscript', 16384);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('sketch1.ai', 'application/postscript', 32768);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('design3.svg', 'image/svg+xml', 65536);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('logo4.ai', 'application/postscript', 131072);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('design4.eps', 'application/postscript', 262144);
INSERT INTO vector_files (filename, mimetype, filesize) VALUES ('sketch2.svg', 'image/svg+xml', 524288);
