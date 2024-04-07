CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_type VARCHAR(50) NOT NULL,
    file_size INT NOT NULL
);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document1.pdf', 'application/pdf', 1024);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document2.jpg', 'image/jpg', 2048);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document3.jpeg', 'image/jpeg', 4096);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document4.pdf', 'application/pdf', 8192);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document5.jpg', 'image/jpg', 16384);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document6.pdf', 'application/pdf', 32768);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document7.jpg', 'image/jpg', 65536);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document8.jpeg', 'image/jpeg', 131072);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document9.pdf', 'application/pdf', 262144);
INSERT INTO documents (filename, file_type, file_size) VALUES ('document10.jpg', 'image/jpg', 524288);
