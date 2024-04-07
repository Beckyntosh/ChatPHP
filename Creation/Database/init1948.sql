CREATE TABLE file_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO file_uploads (filename) VALUES ('uploads/file1.jpg');
INSERT INTO file_uploads (filename) VALUES ('uploads/file2.png');
INSERT INTO file_uploads (filename) VALUES ('uploads/file3.jpg');
INSERT INTO file_uploads (filename) VALUES ('uploads/file4.png');
INSERT INTO file_uploads (filename) VALUES ('uploads/file5.jpg');
INSERT INTO file_uploads (filename) VALUES ('uploads/file6.png');
INSERT INTO file_uploads (filename) VALUES ('uploads/file7.jpg');
INSERT INTO file_uploads (filename) VALUES ('uploads/file8.png');
INSERT INTO file_uploads (filename) VALUES ('uploads/file9.jpg');
INSERT INTO file_uploads (filename) VALUES ('uploads/file10.jpg');