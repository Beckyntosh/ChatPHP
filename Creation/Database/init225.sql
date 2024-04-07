CREATE TABLE IF NOT EXISTS uploaded_zips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_zips (filename) VALUES ('file1.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file2.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file3.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file4.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file5.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file6.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file7.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file8.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file9.zip');
INSERT INTO uploaded_zips (filename) VALUES ('file10.zip');
