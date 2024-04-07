CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploads (filename, file_path) VALUES ('file1.zip', 'uploads/file1.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file2.zip', 'uploads/file2.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file3.zip', 'uploads/file3.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file4.zip', 'uploads/file4.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file5.zip', 'uploads/file5.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file6.zip', 'uploads/file6.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file7.zip', 'uploads/file7.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file8.zip', 'uploads/file8.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file9.zip', 'uploads/file9.zip');
INSERT INTO uploads (filename, file_path) VALUES ('file10.zip', 'uploads/file10.zip');