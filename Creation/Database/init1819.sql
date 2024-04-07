CREATE TABLE uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
);

INSERT INTO uploaded_files (filename, upload_time) VALUES ("file1.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file2.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file3.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file4.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file5.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file6.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file7.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file8.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file9.txt", NOW());
INSERT INTO uploaded_files (filename, upload_time) VALUES ("file10.txt", NOW());