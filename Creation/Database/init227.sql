CREATE TABLE IF NOT EXISTS archive_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO archive_uploads (file_name) VALUES ('file1.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file2.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file3.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file4.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file5.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file6.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file7.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file8.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file9.zip');
INSERT INTO archive_uploads (file_name) VALUES ('file10.zip');
