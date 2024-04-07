CREATE TABLE IF NOT EXISTS printing_services (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT(10) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    status ENUM('pending','printed') DEFAULT 'pending',
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file1.pdf', 1024, 'application/pdf');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file2.png', 512, 'image/png');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file3.docx', 2048, 'application/msword');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file4.jpg', 768, 'image/jpeg');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file5.txt', 256, 'text/plain');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file6.xlsx', 4096, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file7.zip', 6144, 'application/zip');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file8.pptx', 3072, 'application/vnd.openxmlformats-officedocument.presentationml.presentation');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file9.exe', 10240, 'application/octet-stream');
INSERT INTO printing_services (filename, filesize, filetype) VALUES ('file10.mp4', 20480, 'video/mp4');
